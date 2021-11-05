<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$gnl->title}}</title>
</head>

<body>
<form method='POST' action='https://angopay.co/ext_transfer' id="payment_form">
    <input type='hidden' name='merchant_key' value='fw3Uz2lVHYd3V7eH' />
    <input type='hidden' name='public_key' value="PUB-GxS3nU6Nv2OCCfkxr13JHDN1gBpCVTcn" />
    <input type='hidden' name='callback_url' value="{{route('ipn.boompay')}}" />
    <input type='hidden' name='tx_ref' value="{{ $boompay['track'] }}" />
    <input type='hidden' name='amount' value="6345" />
    <input type="hidden" name="email" value="user@test.com" />
    <input type="hidden" name="first_name" value="Finn" />
    <input type="hidden" name="last_name" value="Marshal" />
    <input type="hidden" name="title" value="Tesla Model S" />
    <input type="hidden" name="description" value="lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book." />
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="currency" value="USD" />
    <input type='submit' value='submit' />
</form>

<form method="POST" action="https://angopay.co/ext_transfer" >
    <input type="hidden" name="merchant_key" value="MER-SR6hTn" />
    <input type="hidden" name="public_key" value="PUB-W0Rr1rsRsxIQaza4FQDv9gqCAO7GXjao" />
    <input type="hidden" name="callback_url" value="{{route('ipn.boompay')}}" />
    <input type="hidden" name="tx_ref" value="{{$boompay['track']}}" />
    <input type="hidden" name="amount" value="{{$boompay['amount']}}" />
    <input type="hidden" name="email" value="{{$user->email}}" />
    <input type="hidden" name="first_name" value="{{$user->first_name}}" />
    <input type="hidden" name="last_name" value="{{$user->last_name}}" />
    <input type="hidden" name="title" value="Payment For Item" />
    <input type="hidden" name="description" value="Payment For Item" />
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="currency" value="AZK" />
    <input type="submit" value="submit" />
</form>

</body>

</html>

