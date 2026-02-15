<?php require "includes/header.php" ?>
<main>
  <h2>Contact Us - Bake It Till You Make It Bakery 🧁</h2>
  
  <p>We'd love to hear from you! Please fill out the form below.</p>

  <!-- Contact Form with Client-Side Validation -->
  <form action="process.php" method="post">

    <fieldset>
      <legend>Contact Information</legend>

      <p>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
      </p>

      <p>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
      </p>

      <p>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </p>

      <p>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="6" cols="50" required></textarea>
      </p>

      <p>
        <button type="submit">Send Message</button>
      </p>

    </fieldset>

  </form>
</main>

<?php require "includes/footer.php" ?>