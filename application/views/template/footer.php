<div class="row"></div>
<?php get_footer(); ?>
<script type="text/javascript">
    function showStickySuccessToast(text) {
        $().toastmessage('showToast', {
            text: text,
            sticky: true,
            inEffectDuration: 300, // in effect duration in miliseconds
            stayTime: 3000,
            position: 'top-left',
            type: 'success',
            closeText: '',
        });

    }

</script>

<script>
(function($, Models, Collections, Views) {
    $(document).ready(function() {
        $('.hamburger-menu').on('click', function(event) {
            event.preventDefault();
            $('.fre-header-wrapper').removeClass('notify-active').toggleClass('active');
            $(this).find('.hamburger').toggleClass('is-active');
        });

        $('.notification-tablet').on('click', function(event) {
            event.preventDefault();
            $('.fre-header-wrapper').removeClass('active').toggleClass('notify-active');
            $('.hamburger').removeClass('is-active');
            var data = JSON.parse($('.fre-account-wrap').find('.postdata').html()),
                IDs = [];   
            $.each(data, function(key, value){
                if(value.seen == ''){
                    IDs.push(value.ID); 
                }
            });
            // update seen notify
            $.ajax({
                url : ae_globals.ajaxURL,
                type: 'post',
                data:{
                    action : 'fre-user-seen-notify',
                    IDs : IDs
                },
                beforeSend: function() {    
                },
                success: function(res) {
                    // remove dot notification
                    $('.fre-notification').find('.dot-noti').remove();
                }
            });
        });


        $(document).on('click', '.dropdown-menu', function(e) {
            if ($(this).hasClass('dropdown-keep-open')) { 
                e.stopPropagation(); 
            }
        });
        $('.fre-account-wrap').on('shown.bs.dropdown', function () {
            var data = JSON.parse($(this).find('.postdata').html()),
                IDs = [];   
            $.each(data, function(key, value){
                if(value.seen == ''){
                    IDs.push(value.ID); 
                }
            });
            // update seen notify
            $.ajax({
                url : ae_globals.ajaxURL,
                type: 'post',
                data:{
                    action : 'fre-user-seen-notify',
                    IDs : IDs
                },
                beforeSend: function() {    
                },
                success: function(res) {
                    // remove dot notification
                    $('.fre-notification').find('.dot-noti').remove();
                }
            });
        });
        $('.fre-account-wrap').on('hidden.bs.dropdown', function(e){
            $(this).find('ul.list_notify li').removeClass('fre-notify-new');
        });
        // Form Search
        $('.fre-search-dropdown li').on("click", function(){
            var action = $(this).find('a').data('action'),
                placeholder = $(this).find('a').html();

            $('.fre-form-search').attr('action',action);
            $('.fre-form-search input[name="keyword"]').attr('placeholder', placeholder).val('');
            // add class
            $('.fre-search-dropdown li a').removeClass('active');
            $(this).find('a').addClass('active');
        });

        if( $('#fre_notification_container').length > 0 ){

            if( $('#fre_notification_container').find('.postdata').length > 0 ){
                var postsdata = JSON.parse($('#fre_notification_container').find('.postdata').html()),
                    posts = new Collections.Notify(postsdata);
            } else {
                var posts = new Collections.Notify();
            }
            /**
             * init list blog view
             */
            new ListNotify({
                itemView: NotifyItem,
                collection: posts,
                el: $('#fre_notification_container').find('.fre-notification-list'),

            });
            new Views.BlockControl({
                collection: posts,
                el: $('#fre_notification_container')
            });
        }
        $('.list_notify').on('click', 'a.notify-remove', function(event) {
            event.preventDefault();
            var view = this,
                $target = $(event.currentTarget);
                itemID = $target.data('id'),
                classItem = '.notify-item.item-'+itemID,
                $notifyItem = $(classItem);
            $.ajax({
                url : ae_globals.ajaxURL,
                type: 'post',
                data:{
                    action : 'fre-notify-remove',
                    ID : itemID,
                    type : 'delete'
                },
                beforeSend: function() {
                    blockUi.block($(view).parents('.notify-item'));
                },
                success: function(res) {
                    if (res.success) {
                        $notifyItem.prepend(template_undo);
                        $notifyItem.find('.fre-notify-archive span').attr('data-id', itemID);
                    }
                    blockUi.unblock();
                }
            })
        });

    });

})(jQuery);
</script>

