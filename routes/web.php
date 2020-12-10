<?php



Route::get('/', function () {
    return redirect()->route('login');
});
// Route::get('/', function () {
//     return redirect()->route('register');
// });
// ['verify' => true]
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Employee Data Section
Route::get('/All.Employee', 'EmployeeController@AllEmployee')->name('all-employee');
Route::get('/Add.Employee', 'EmployeeController@AddEmployee')->name('add-employee');
Route::post('/insert-employee', 'EmployeeController@StoreEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
//Customer data Section

Route::get('/All.Customer', 'CustomerController@AllCustomer')->name('all-customer');
Route::get('/Add.Customer', 'CustomerController@AddCustomer')->name('add-customer');
Route::post('/insert-customer', 'CustomerController@StoreCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');
//Supplier data Section

Route::get('/All.Supplier', 'SupplierController@AllSupplier')->name('all-supplier');
Route::get('/Add.Supplier', 'SupplierController@AddSupplier')->name('add-supplier');
Route::post('/insert-supplier', 'SupplierController@StoreSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier');
//Salary Section

Route::get('/add-advanced-salary', 'SalaryController@AddAdvancedSalary')->name('add-advanced-salary');
Route::get('/all-advanced-salary', 'SalaryController@AllAdvancedSalary')->name('all-advanced-salary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay-salary');
Route::get('/last-month-salary', 'SalaryController@LastMonthSalary')->name('last-month-salary');
Route::post('/insert-advanced-salary', 'SalaryController@StoreAdvancedSalary');
Route::get('/edit-advanced-salary/{id}', 'SalaryController@EditAdvancedSalary');
Route::post('/update-advanced-salary/{id}', 'SalaryController@UpdateAdvancedSalary');

//Catagory Section
Route::get('/add-category', 'CategoryController@AddCategory')->name('add-category');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all-category');
Route::post('/insert-category', 'CategoryController@StoreCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
// Products Section
Route::get('/add-product', 'ProductController@AddProduct')->name('add-product');
Route::get('/all-product', 'ProductController@AllProduct')->name('all-product');
Route::post('/insert-product', 'ProductController@StoreProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');
// Import Product
Route::get('/import-product', 'ProductController@ImportProduct')->name('import-product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');
// Expence Section
Route::get('/add-expence', 'ExpenceController@AddExpence')->name('add-expence');
Route::get('/today-expence', 'ExpenceController@TodayExpence')->name('today-expence');
Route::get('/monthly-expence', 'ExpenceController@MonthlyExpence')->name('monthly-expence');
Route::post('/insert-expence', 'ExpenceController@StoreExpence');
Route::get('/edit-expence/{id}', 'ExpenceController@EditExpence');
Route::post('/update-expence/{id}', 'ExpenceController@UpdateExpence');
Route::get('/delete-expence/{id}', 'ExpenceController@DeleteExpence');
Route::get('/view-expence/{id}', 'ExpenceController@ViewExpence');
Route::get('/view-monthly-expence/{id}', 'ExpenceController@ViewMonthly');
// All Monthly Expence
Route::get('/january-expence', 'ExpenceController@JanuaryExpence')->name('january-expence');
Route::get('/february-expence', 'ExpenceController@FebruaryExpence')->name('february-expence');
Route::get('/march-expence', 'ExpenceController@MarchExpence')->name('march-expence');
Route::get('/april-expence', 'ExpenceController@AprilExpence')->name('april-expence');
Route::get('/may-expence', 'ExpenceController@MayExpence')->name('may-expence');
Route::get('/june-expence', 'ExpenceController@JuneExpence')->name('june-expence');
Route::get('/july-expence', 'ExpenceController@JulyExpence')->name('july-expence');
Route::get('/august-expence', 'ExpenceController@AugustExpence')->name('august-expence');
Route::get('/september-expence', 'ExpenceController@SeptemberExpence')->name('september-expence');
Route::get('/october-expence', 'ExpenceController@OctoberExpence')->name('october-expence');
Route::get('/november-expence', 'ExpenceController@NovemberExpence')->name('november-expence');
Route::get('/december-expence', 'ExpenceController@DecemberExpence')->name('december-expence');
//Attendence report....

Route::get('/add-attendence', 'AttendenceController@AddAttendence')->name('add-attendence');
Route::get('/all-attendence', 'AttendenceController@AllAttendence')->name('all-attendence');
Route::post('/insert-attendence', 'AttendenceController@StoreAttendence');
Route::get('/edit-attendence/{att_date}', 'AttendenceController@EditAttendence');
Route::get('/delete-attendence/{att_date}', 'AttendenceController@DeleteAttendence');
Route::post('/update-attendence', 'AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{att_date}', 'AttendenceController@ViewAttendence');

//  POS (Poin Of Sell)
Route::get('/pos', 'PosController@StorePos')->name('pos');
Route::post('/add-cart', 'PosController@AddCart')->name('add-cart');
Route::post('/cart-update/{rowId}', 'PosController@CartUpdate');
Route::get('/cart-delete/{rowId}', 'PosController@CartDelete');
Route::post('/create-invoice', 'PosController@CreateInvoice');

Route::post('/invoice-details', 'PosController@InvoiceDetails')->name('invoice-details');

//Orders
Route::get('/pending-orders', 'OrderController@PendingOrder')->name('pending-order');
Route::get('/view-orders/{id}', 'OrderController@ViewOrder');
Route::get('/pos-done/{id}', 'OrderController@PosDone');
Route::get('/success-order', 'OrderController@SuccessOrder')->name('success-order');



