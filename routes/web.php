<?php

use Illuminate\Support\Facades\Route;

//frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');




//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@log_out');


//Category-Product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::get('/edit-category-product/{id_category}', 'CategoryProduct@edit_category_product');
Route::post('/update-category-product/{id_category}', 'CategoryProduct@update_category_product');

//Supplier

Route::get('/all-supplier', 'Supplier@all_supplier');
Route::get('/add-supplier', 'Supplier@add_supplier');
Route::post('/save-supplier', 'Supplier@save_supplier');
Route::get('/edit-supplier/{id_supplier}', 'Supplier@edit_supplier');
Route::post('/update-supplier/{id_supplier}', 'Supplier@update_supplier');


//products
Route::get('/all-product', 'ProductController@all_product');
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{id_product}', 'ProductController@edit_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/detail-product/{id_product}', 'ProductController@detail_product');
Route::post('/update-product/{id_product}', 'ProductController@update_product');


//employee
Route::get('/all-employee', 'EmployeeController@all_employee');
Route::get('/add-employee', 'EmployeeController@add_employee');
Route::post('/save-employee', 'EmployeeController@save_employee');
Route::get('/edit-employee/{id_employee}', 'EmployeeController@edit_employee');
Route::post('/update-employee/{id_employee}', 'EmployeeController@update_employee');

//Customer
Route::get('/all-customer', 'CustomerController@all_customer');


//Invoice
Route::get('/all-invoice', 'InvoiceController@all_invoice');
Route::get('/detail-invoice/{id_invoice}', 'InvoiceController@detail_invoice');
Route::get('/update-status-order/{id_invoice}', 'InvoiceController@update_invoice');