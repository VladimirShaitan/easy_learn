<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= 'Поле {field} обязательное для заполнения.';
$lang['form_validation_isset']			= '{field} поле должно иметь значение.';
$lang['form_validation_valid_email']		= ' {field} поле должно содержать действительный адрес электронной почты.';
$lang['form_validation_valid_emails']		= '{field} поле должно содержать допустимый адрес электронной почты.';
$lang['form_validation_valid_url']		= '{field} поле должно содержать допустимый URL-адрес.';
$lang['form_validation_valid_ip']		= ' {field} поле должно содержать действительный IP-адрес.';
$lang['form_validation_min_length']		= ' {field} поле должно быть не менее {param} символов в длину.';
$lang['form_validation_max_length']		= ' {field} поле не может превышать {param} символов в длину.';
$lang['form_validation_exact_length']		= ' {field} поле должно быть точно {param} символов в длину.';
$lang['form_validation_alpha']			= ' {field} поле может содержать только алфавитные символы.';
$lang['form_validation_alpha_numeric']		= ' {field} поле может содержать только числовые символы.';
$lang['form_validation_alpha_numeric_spaces']	= ' {field} поле может содержать только буквенно-цифровые символы и пробелы.';
$lang['form_validation_alpha_dash']		= ' {field} поле может содержать только буквенно-цифровые символы, символы подчеркивания и тире.';
$lang['form_validation_numeric']		= ' {field} поле должно содержать только числовые символы.';
$lang['form_validation_is_numeric']		= ' {field} поле должно содержать только числовые символы.';
$lang['form_validation_integer']		= ' {field} поле должно содержать целое число.';
$lang['form_validation_regex_match']		= ' {field} поле не в правильном формате.';
$lang['form_validation_matches']		= 'Поле {field} не соответствует полю {param} .';
$lang['form_validation_differs']		= ' {field} поле должно отличаться от {param} поля.';
$lang['form_validation_is_unique'] 		= ' {field} поле должно содержать уникальное значение.';
$lang['form_validation_is_natural']		= ' {field} поле должно содержать только цифры.';
$lang['form_validation_is_natural_no_zero']	= ' {field} поле должно содержать только цифры и должно быть больше нуля.';
$lang['form_validation_decimal']		= '{field} поле должно содержать десятичное число.';
$lang['form_validation_less_than']		= ' {field} поле должно содержать число, меньшее {param}.';
$lang['form_validation_less_than_equal_to']	= ' {field} поле должно содержать число, меньшее или равное {param}.';
$lang['form_validation_greater_than']		= ' {field} поле должно содержать число, большее {param}.';
$lang['form_validation_greater_than_equal_to']	= ' {field} поле должно содержать число, большее или равное {param}.';
$lang['form_validation_error_message_not_set']	= 'Не удалось получить доступ к сообщению об ошибке, соответствующему имени вашего поля {field}.';
$lang['form_validation_in_list']		= ' {field} поле должно быть одним из: {param}.';
