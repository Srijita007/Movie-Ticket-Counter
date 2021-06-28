<?php
include '../db_connect.php';
session_start();

$MERCHANT_KEY = "rjQUPktU";
$SALT = "e5iIg1jwi8";
// Merchant Key and Salt as provided by Payu.

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";    // For Sandbox Mode
$PAYU_BASE_URL = "https://test.payu.in";
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if (!empty($_POST)) {
  //print_r($_POST);
  foreach ($_POST as $key => $value) {
    $posted[$key] = $value;
  }
}

$formError = 0;

if (empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";
if (empty($posted['hash']) && sizeof($posted) > 0) {
  if (
    empty($posted['key'])
    || empty($posted['txnid'])
    || empty($posted['amount'])
    || empty($posted['firstname'])
    || empty($posted['email'])
    || empty($posted['phone'])
    || empty($posted['productinfo'])
    || empty($posted['surl'])
    || empty($posted['furl'])
    || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach ($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif (!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Roboto|Courgette|Merriweather|Lato">

  <link rel="stylesheet" href="../main.css">

  <script>
    var hash = '<?php echo $hash ?>';

    function submitPayuForm() {
      if (hash == '') {
        return;
      }
      var payuForm = document.getElementById('payuForm');
      payuForm.submit();
    }
  </script>
</head>

<body onload="submitPayuForm()">

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include '../header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='../logout.php'">Logout</button>
      </div>
    </div>
  </section>

  <?php if ($formError) { ?>

    <span style="color:red">Please fill all mandatory fields.</span>
    <br />
    <br />
  <?php } ?>
  <form id="payuForm" class="container-fluid" action="<?php echo $action; ?>" method="post" name="payuForm">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>" />
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <table>
      <tr>
        <!-- <td><b>Mandatory Parameters</b></td> -->
      </tr>
      <tr>
        <!-- <td>Amount: </td> -->
        <td><input type="hidden" name="amount" value="<?php echo (empty($_SESSION['total_amount'])) ? '' : $_SESSION['total_amount'] ?>" /></td>
        <!-- <td>First Name: </td> -->
        <td><input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($_SESSION['name'])) ? '' : $_SESSION['name']; ?>" /></td>
      </tr>
      <tr>
        <!-- <td>Email: </td> -->
        <td><input type="hidden" name="email" id="email" value="<?php echo (empty($_SESSION['email'])) ? '' : $_SESSION['email']; ?>" /></td>
        <!-- <td>Phone: </td> -->
        <td><input type="hidden" name="phone" value="<?php echo (empty($_SESSION['contact'])) ? '' : $_SESSION['contact']; ?>" /></td>
      </tr>
      <tr>
        <!-- <td>Product Info: </td> -->
        <td colspan="3"><textarea style="display:none;" name="productinfo"><?php echo (empty($_SESSION['products'])) ? '' : $_SESSION['products'] ?></textarea></td>
      </tr>
      <tr>
        <!-- <td>Success URI: </td> -->
        <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($_SESSION['surl'])) ? '' : $_SESSION['surl'] ?>" size="64" /></td>
      </tr>
      <tr>
        <!-- <td>Failure URI: </td> -->
        <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($_SESSION['furl'])) ? '' : $_SESSION['furl'] ?>" size="64" /></td>
      </tr>

      <tr>
        <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
      </tr>
      <tr>
        <?php if (!$hash) { ?>
          <div id="proceed_to_payment">Are you sure you want to proceed to payment?</div><br><br>
          <td colspan="5"><button class="accept_button" type="submit" value="Submit">Yes</button></td>
        <?php } ?>
      </tr>
    </table>
  </form>
  <?php include '../footer.php' ?>
</body>

</html>