<?php         
 require_once('vendor/autoload.php');
 require_once('config/db_config.php');
 require_once('lib/pdo_db.php');
 require_once('models/Customers.php');
 require_once('models/Transactions.php');

 \Stripe\Stripe::setApiKey('sk_test_E2qw1f3Tf1PQdYQWpr5Qq5vY');

 //Sanitize Post array
 $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);

 $first_name=$POST['first_name'];
 $last_name=$POST['last_name'];
 $email=$POST['email'];
 $token=$POST['stripeToken'];
 
 $customer=\Stripe\Customer::create(array(
     "email"=>$email,
     "source"=> $token
 ));
 $charge=\Stripe\Charge::create(array(
 "amount"=>5000,
 "currency"=>"usd",
 "description"=>"Intro To React Course",
 "customer"=> $customer->id
));

//customer data
$customerdata=[
    'id'=>$charge->customer,
    'first_name'=>$first_name,
    'last_name'=>$last_name,
    'email'=>$email
];

//instantiate customers
$customers =new Customer();

//add customers
$customers->addCustomer($customerdata);

//transaction data
$transactiondata=[
    'id'=>$charge->id,
    'customer_id'=>$charge->customer,
    'product'=>$charge->description,
    'amount'=>$charge->amount,
    'currency'=>$charge->currency,
    'status' => $charge->status
];

//instantiate Transactions
$transactions =new Transaction();

//add customers
$transactions->addTransaction($transactiondata);

 //redirect to success
 header('Location:success.php?tid='.$charge->id.'&product='.$charge->description);
 // Redirect to success

 

 ?>