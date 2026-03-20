<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>2pay - Cryptocurrency Payment Gateway</title>
	<link rel="icon" type="image/png" sizes="32x32" href="https://i.ibb.co/R4b8Yc99/c.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: #071013; }
    .dark-card { background-color: #131a22; color: #f8f9fa; }
    .hidden { display: none !important; }
    .fade-in { animation: fadeIn 0.35s ease forwards; opacity: 0; }
    @keyframes fadeIn { to { opacity: 1; } }
    .loader-wrap { display: flex; flex-direction: column; align-items: center; gap:.75rem; padding:1rem 0; }
    .crypto-banner { color: #f1c40f; text-align: center; padding: 12px 0; font-weight: bold; font-size: 1rem; letter-spacing: 1px; text-transform: uppercase;
    }
  </style>
</head>
<body class="text-light">

<div class="container1 d-flex justify-content-center align-items-center min-vh-100" id="container1">
  <div class="card dark-card text-white p-4 shadow-lg" style="max-width: 450px; border-radius: 15px;">
    <div class="card-body">
      <center><img src="https://i.ibb.co/R4b8Yc99/c.png" alt="Logo" class="mb-3" style="width:100px;object-fit:contain;"></center>
		<div class="crypto-banner">
		  Cryptocurrency Automatic Gateway <br>
		  Fast, Secure, and Easy Payments
		</div><hr>
      <div class="text-muted mb-4" style="font-size: 0.9rem; text-align:left;">
        <p class="mb-1">Follow these steps to complete your deposit:</p>
        <ol style="padding-left:18px; margin:0;">
          <li>Enter the amount you want to deposit (minimum $50).</li>
          <li>Select your preferred crypto payment gateway.</li>
          <li>Click <b>Next</b> to get your unique wallet address.</li>
          <li>Send the exact crypto amount shown to the wallet address.</li>
          <li>Wait for blockchain confirmation. funds will be credited automatically.</li>
        </ol>
      </div>

      <form id="depositForm" novalidate>
        <div class="mb-3">
          <label class="form-label">Amount (USD)</label>
          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" id="amountInput" min="50" step="0.01" placeholder="Minimum 50.00" required />
          </div>
          <div class="form-text text-muted">Minimum deposit is $50.00</div>
          <div class="invalid-feedback d-block" id="amountError" style="display:none;">Amount must be at least $50.00</div>
        </div>

        <div class="mb-3">
          <label class="form-label">Payment Gateway</label>
          <select class="form-select" id="gatewaySelect" required>
            <option value="" disabled selected>Choose</option>
            <option value="BTC">Bitcoin (BTC)</option>
            <option value="ETH">Ethereum (ETH)</option>
            <option value="USDT-TRC20">Tether (USDT - TRC20)</option>
            <option value="USDT-ERC20">Tether (USDT - ERC20)</option>
            <option value="USDT-BEP20">Tether (USDT - BEP20)</option>
            <option value="USDC">USDC (USD Coin)</option>
            <option value="BNB">Binance Coin (BNB)</option>
            <option value="SOL">Solana (SOL)</option>
            <option value="LTC">Litecoin (LTC)</option>
            <option value="DOGE">Dogecoin (DOGE)</option>
          </select>
          <div class="invalid-feedback d-block" id="gatewayError" style="display:none;">Please select a payment gateway</div>
        </div>

        <button type="submit" class="btn btn-warning w-100">
          Next <i class="bi bi-arrow-right-short"></i>
        </button>
      </form>
    </div>
  </div>
</div>

<div class="container2 d-flex justify-content-center align-items-center min-vh-100 hidden" id="container2">
  <div class="card dark-card text-white p-4 shadow-lg" style="max-width: 450px; border-radius: 15px;">
    <div class="card-body text-center">
      <center><img src="https://i.ibb.co/R4b8Yc99/c.png" alt="Logo" class="mb-3" style="width:100px;object-fit:contain;"></center>
		<div class="crypto-banner">
		  Cryptocurrency Automatic Gateway <br>
		  Fast, Secure, and Easy Payments
		</div><hr>
      <div id="loader" class="loader-wrap">
        <div class="spinner-border" role="status"></div>
        <div>Preparing your payment...</div>
      </div>

      <div id="paymentDetails" class="hidden">
        <h3 class="mb-3">Payment Details</h3>
        <p><strong>Deposit ID:</strong> <span id="depositIdText">DEP000000</span></p>
        <h2 class="fw-bold" id="cryptoAmountText">-</h2>
        <p id="usdAmountText">-</p>

        <p class="mt-3 text-start">Payment Address:</p>
        <div class="d-flex justify-content-between align-items-center p-2 bg-dark rounded">
          <small class="text-truncate" style="max-width: 80%;" id="payAddress">-</small>
          <button onclick="copyToClipboard(document.getElementById('payAddress').innerText)" class="btn btn-outline-light btn-sm">
            <i class="bi bi-clipboard"></i>
          </button>
        </div>

        <div class="d-flex justify-content-center flex-column align-items-center">
          <img id="qrImage" src="" alt="QR Code" class="p-4">
          <small class="text-muted">Please scan the QR code or copy the address to make payment.</small>
        </div>

        <div id="copyMessage" class="alert alert-success alert-dismissible fade show mt-3 d-none" role="alert">
          Address copied!
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <div class="mt-3">
          <button type="button" onclick="submitPayment(event)" class="btn btn-success w-100 mt-3">Paid</button>
          <div id="submit-spinner" style="display: none; margin-top: 15px;">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-outline-danger w-100 mt-2" onclick="goBack()">Change Gateway</button>
      </div>
    </div>
  </div>
</div>

<div class="container3 d-flex justify-content-center align-items-center min-vh-100 hidden" id="container3">
  <div class="card dark-card text-white p-4 shadow-lg text-center" style="max-width: 450px; border-radius: 15px;">
    <div class="card-body">
      <center><img src="https://i.ibb.co/R4b8Yc99/c.png" alt="Logo" class="mb-3" style="width:100px;object-fit:contain;"></center>
		<div class="crypto-banner">
		  Cryptocurrency Automatic Gateway <br>
		  Fast, Secure, and Easy Payments
		</div><hr>

      <div class="loader-wrap">
        <div class="spinner-border text-warning" role="status" style="width:3rem;height:3rem;"></div>
        <h5 class="mt-3">Waiting for Confirmation...</h5>
        <p class="text-muted small">This may take a few minutes depending on the blockchain speed.</p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function generateDepositId() {
    var six = String(Math.floor(Math.random() * 1000000)).padStart(6, '0');
    return "DEP".concat(six);
  }

  function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function () {
      var msg = document.getElementById('copyMessage');
      msg.classList.remove('d-none');
      setTimeout(function () { msg.classList.add('d-none'); }, 2000);
    });
  }

  function goBack() {
    document.getElementById('paymentDetails').classList.add('hidden');
    document.getElementById('loader').classList.remove('hidden');
    document.getElementById('container2').classList.add('hidden');
    document.getElementById('container1').classList.remove('hidden');
  }

  function fetchWalletAddress(network, currency, cb) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://api.oxapay.com/v1/payment/static-address", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("merchant_api_key", "VR0MVJ-5BH6EM-CO7085-IEX6YK");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        try {
          var res = JSON.parse(xhr.responseText);
          cb(res && res.data && res.data.address ? res.data.address : null);
        } catch (e) {
          console.error(e);
          cb(null);
        }
      }
    };
    xhr.send(JSON.stringify({
      network: network,
      currency: currency,
      callback_url: "https://yourdomain.com/callback"
    }));
  }

  function convertToCrypto(amountUsd, currency, cb) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.oxapay.com/v1/common/prices", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        try {
          var res = JSON.parse(xhr.responseText);
          var price = res.data[currency.toUpperCase()];
          if (price) {
            cb(amountUsd / price);
          } else cb(null);
        } catch (e) {
          console.error(e);
          cb(null);
        }
      }
    };
    xhr.send();
  }

  function getNetworkCurrency(code) {
    if (code === "BTC") return { network: "Bitcoin", currency: "BTC" };
    if (code === "ETH") return { network: "Ethereum", currency: "ETH" };
    if (code === "SOL") return { network: "Solana", currency: "SOL" };
    if (code === "USDC") return { network: "Ethereum", currency: "USDC" };
    if (code === "LTC") return { network: "Litecoin", currency: "LTC" };
    if (code === "DOGE") return { network: "Dogecoin", currency: "DOGE" };
    if (code === "BNB") return { network: "Binance", currency: "BNB" };
    if (code === "USDT-BEP20") return { network: "Binance", currency: "USDT" };
    if (code === "USDT-TRC20") return { network: "Tron", currency: "USDT" };
    if (code === "USDT-ERC20") return { network: "Ethereum", currency: "USDT" };
    return { network: "", currency: "" };
  }

  document.getElementById("depositForm").addEventListener("submit", function (e) {
    e.preventDefault();
    var amount = parseFloat(document.getElementById("amountInput").value);
    var code = document.getElementById("gatewaySelect").value;

    if (isNaN(amount) || amount < 50) {
      document.getElementById("amountError").style.display = "block";
      alert("Deposit amount must be at least $50.00");
      return;
    } else {
      document.getElementById("amountError").style.display = "none";
    }

    if (!code) {
      document.getElementById("gatewayError").style.display = "block";
      return;
    } else {
      document.getElementById("gatewayError").style.display = "none";
    }

    document.getElementById("container1").classList.add("hidden");
    document.getElementById("container2").classList.remove("hidden");

    var netCur = getNetworkCurrency(code);
    var network = netCur.network;
    var currency = netCur.currency;

    fetchWalletAddress(network, currency, function (address) {
      if (!address) { alert("Failed to get wallet"); goBack(); return; }
      convertToCrypto(amount, currency, function (cryptoAmount) {
        if (!cryptoAmount) { alert("Failed to convert amount"); goBack(); return; }
        var depId = generateDepositId();
        document.getElementById("depositIdText").innerText = depId;
        document.getElementById("usdAmountText").innerText = "$".concat(amount.toFixed(2));
        document.getElementById("cryptoAmountText").innerText = cryptoAmount.toFixed(6).concat(" ", currency);
        document.getElementById("payAddress").innerText = address;
        document.getElementById("qrImage").src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".concat(encodeURIComponent(address));
        document.getElementById("loader").classList.add("hidden");
        document.getElementById("paymentDetails").classList.remove("hidden");
      });
    });
  });

  function submitPayment(event) {
    document.getElementById("submit-spinner").style.display = "block";
    var button = event.target;
    button.disabled = true;
    setTimeout(function () {
      document.getElementById("container2").classList.add("hidden");
      document.getElementById("container3").classList.remove("hidden");
      document.getElementById("container3").classList.add("fade-in");
      document.getElementById("submit-spinner").style.display = "none";
      button.disabled = false;
    }, 2000);
  }
</script>


</body>
</html>