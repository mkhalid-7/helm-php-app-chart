<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Webinar Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }
    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px;
    }
    .formbold-form-wrapper {
      background: white;
      max-width: 650px;
      width: 100%;
      padding: 32px;
      border-radius: 8px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }
    .formbold-event-wrapper span {
      text-transform: uppercase;
      font-size: 14px;
      color: #888;
      letter-spacing: 2px;
    }
    .formbold-event-wrapper h3 {
      margin: 8px 0;
      font-size: 24px;
      color: #111;
    }
    .formbold-event-wrapper img {
      width: 100%;
      max-width: 100%;
      height: auto;
      margin-top: 16px;
      border-radius: 6px;
    }
    .formbold-event-wrapper h4 {
      margin-top: 20px;
      font-size: 20px;
    }
    .formbold-event-wrapper p {
      margin-top: 8px;
      line-height: 1.6;
    }
    .formbold-event-details {
      margin-top: 24px;
    }
    .formbold-event-details h5 {
      margin-bottom: 8px;
      font-size: 18px;
      font-weight: 600;
    }
    .formbold-event-details ul {
      list-style: none;
      padding: 0;
    }
    .formbold-event-details li {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      font-size: 15px;
    }
    .formbold-event-details svg {
      margin-right: 8px;
      min-width: 18px;
    }

    .formbold-form-title {
      font-size: 22px;
      margin: 24px 0 12px;
    }

    .formbold-input-flex {
      display: flex;
      gap: 16px;
      margin-bottom: 20px;
    }

    .formbold-form-label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    .formbold-form-input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .formbold-policy {
      font-size: 13px;
      margin: 16px 0;
    }

    .formbold-policy a {
      color: #007BFF;
      text-decoration: none;
    }

    .formbold-btn {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 600;
    }

    .formbold-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <div class="formbold-event-wrapper">
        <span>Webinars</span>
        <h3>The Design Leadership Conference</h3>
        <img src="https://picsum.photos/id/1/800/400" alt="Event Banner" />
        <h4>What you’ll learn</h4>
        <p>
          Discover how to lead with creativity, inspire innovation, and drive meaningful design outcomes. You'll gain practical strategies for managing teams, scaling design processes, and aligning design with business success.
        </p>

        <div class="formbold-event-details">
          <h5>Event Details</h5>
          <ul>
            <li>
              📅 June 25, 2025
            </li>
            <li>
              ⏰ 10:30am - 2pm MDT
            </li>
            <li>
              📍 New York, USA
            </li>
            <li>
              🧠 Information & Tech
            </li>
          </ul>
        </div>
      </div>

      <form action="register.php" method="POST">
        <h2 class="formbold-form-title">Register Now</h2>

        <div class="formbold-input-flex">
          <div>
            <label for="firstname" class="formbold-form-label">First Name*</label>
            <input type="text" id="firstname" name="firstname" class="formbold-form-input" required />
          </div>
          <div>
            <label for="lastname" class="formbold-form-label">Last Name*</label>
            <input type="text" id="lastname" name="lastname" class="formbold-form-input" required />
          </div>
        </div>

        <div class="formbold-input-flex">
          <div>
            <label for="email" class="formbold-form-label">Email*</label>
            <input type="email" id="email" name="email" class="formbold-form-input" required />
          </div>
          <div>
            <label for="phone" class="formbold-form-label">Phone Number*</label>
            <input type="tel" id="phone" name="phone" class="formbold-form-input" required />
          </div>
        </div>

        <div class="formbold-input-flex">
          <div>
            <label for="jobtitle" class="formbold-form-label">Job Title*</label>
            <input type="text" id="jobtitle" name="jobtitle" class="formbold-form-input" required />
          </div>
          <div>
            <label for="company" class="formbold-form-label">Company*</label>
            <input type="text" id="company" name="company" class="formbold-form-input" required />
          </div>
        </div>

        <div class="formbold-input-flex">
          <div>
            <label for="state" class="formbold-form-label">State*</label>
            <input type="text" id="state" name="state" class="formbold-form-input" required />
          </div>
          <div>
            <label for="country" class="formbold-form-label">Country*</label>
            <input type="text" id="country" name="country" class="formbold-form-input" required />
          </div>
        </div>

        <div>
          <label for="postcode" class="formbold-form-label">Post Code*</label>
          <input type="text" id="postcode" name="postcode" class="formbold-form-input" required />
        </div>

        <p class="formbold-policy">
          By filling out this form and clicking submit, you acknowledge our
          <a href="#">privacy policy</a>.
        </p>
        <button type="submit" class="formbold-btn">Submit Event Registration</button>
      </form>
    </div>
  </div>
</body>
</html>
