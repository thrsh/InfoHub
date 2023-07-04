<!DOCTYPE html>
<html>
<head>
  <title>Modal with Vertical Connected Circles Progress Bar</title>
  <style>
    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      position: relative;
    }

    .close {
      color: #aaa;
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    /* Progress bar styles */
    .progress-bar {
      height: 300px;
      width: 10px;
      background-color: #f2f2f2;
      border-radius: 10px;
      margin-right: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .circle {
      width: 20px;
      height: 20px;
      background-color: #4caf50;
      border-radius: 50%;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    .circle:first-child {
      top: 0;
      transform: translateX(-50%) translateY(-50%);
    }

    .circle:last-child {
      bottom: 0;
      transform: translateX(-50%) translateY(50%);
    }

    .progress-line {
      width: 10px;
      background-color: #4caf50;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      transition: height 0.3s ease;
      height: 0;
    }

    .progress-line:first-child {
      top: 0;
    }

    .progress-line:last-child {
      bottom: 0;
    }

    .form-step {
      display: none;
    }

    .form-buttons {
      margin-top: 20px;
    }

    .form-buttons button {
      margin-right: 10px;
    }

    .form-buttons::after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
  <script>
    function openModal() {
      document.getElementById("modalRegisterForm").style.display = "block";
      navigateToStep("step-1");
    }

    function closeModal() {
      document.getElementById("modalRegisterForm").style.display = "none";
    }

    function navigateToStep(step) {
      var formSteps = document.getElementsByClassName("form-step");
      for (var i = 0; i < formSteps.length; i++) {
        formSteps[i].style.display = "none";
      }

      document.getElementById(step).style.display = "block";

      var currentStep = parseInt(step.slice(5));
      var totalSteps = formSteps.length;

      var progressLine = document.getElementById("progress-line");
      var progressHeight = ((currentStep - 1) / (totalSteps - 1)) * 100;
      progressLine.style.height = progressHeight + "%";

      var circles = document.getElementsByClassName("circle");
      for (var i = 0; i < circles.length; i++) {
        if (i < currentStep - 1) {
          circles[i].style.backgroundColor = "#4caf50";
        } else {
          circles[i].style.backgroundColor = "transparent";
        }
      }
    }
  </script>
</head>
<body>
  <button onclick="openModal()">Open Modal</button>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
    
      <div class="progress-bar">
        <div class="circle"></div>
        <div class="progress-line" id="progress-line"></div>
        <div class="circle"></div>
      </div>

      <form>
        <div id="step-1" class="form-step">
          <h2>Step 1: Personal Information</h2>
          <input type="text" placeholder="Name" required><br>
          <input type="text" placeholder="Email" required><br>
          <div class="form-buttons">
            <button type="button" onclick="navigateToStep('step-2')">Next</button>
          </div>
        </div>

        <div id="step-2" class="form-step">
          <h2>Step 2: Contact Details</h2>
          <input type="text" placeholder="Phone Number" required><br>
          <input type="text" placeholder="Address" required><br>
          <div class="form-buttons">
            <button type="button" onclick="navigateToStep('step-1')">Previous</button>
            <button type="button" onclick="navigateToStep('step-3')">Next</button>
          </div>
        </div>

        <div id="step-3" class="form-step">
          <h2>Step 3: Account Setup</h2>
          <input type="text" placeholder="Username" required><br>
          <input type="password" placeholder="Password" required><br>
          <div class="form-buttons">
            <button type="button" onclick="navigateToStep('step-2')">Previous</button>
            <button type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
