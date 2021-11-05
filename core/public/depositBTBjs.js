<script type="text/javascript">
  window.addEventListener('load', async () => {
    if (window.ethereum) {
      window.web3 = new Web3(ethereum);
      try {
        await ethereum.enable();
        initPayButton()
      } catch (err) {
        $('#status').html('User denied account access', err)
      }
    } else if (window.web3) {
      window.web3 = new Web3(web3.currentProvider)
      initPayButton()
    } else {
      $('#status').html('No Metamask (or other Web3 Provider) installed')
    }
  })

  const initPayButton = () => {
    $('.pay-button').click(() => {
      // paymentAddress is where funds will be send to
      const paymentAddress = '0x73A1E3357f6FE7AD617c27364506811A99328674'
      const amountEth = <?php echo json_encode("1", JSON_HEX_TAG); ?>;

      web3.eth.sendTransaction({
    from: ethereum.selectedAddress,
        to: paymentAddress,
        value: web3.utils.toWei(amountEth, 'ether')
      }, (err, transactionId) => {
        if  (err) {
          console.log('Payment failed', err)
          $('#status').html('Payment failed')
        } else {
          console.log('Payment successful', transactionId)
          $('#status').html('Payment successful')
          function updateTextInput(val) {
            document.getElementById('investment').value=val;
          }
          $('#loggedUserInfoForm').submit(function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: 'wallet.php',
                  data: $(this).serialize(),
                  success: function(response)
                  {
                      var jsonData = JSON.parse(response);

                      if (jsonData.success == $("#investment").val())
                      {
                          location.href = 'coins.php';
                      }
                      else
                      {
                          alert('Invalid Operations! Please, try again.');
                      }
                 }
             });
           });
        }
      })
    })
  }

</script>
