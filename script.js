// Function to validate the form
function validateRegistrationForm(event) {
    // event.preventDefault(); // Prevent form submission

    // Get form input values
    const firstName = document.getElementById('first_4').value.trim();
    const lastName = document.getElementById('last_4').value.trim();
    const studentNumber = document.getElementById('input_9').value.trim();
    const email = document.getElementById('input_10').value.trim();
    const password = document.getElementById('input_10').value.trim();
    const phoneNumber = document.getElementById('input_61_full').value.trim();
    const birthMonth = document.getElementById('input_15_month').value.trim();
    const birthDay = document.getElementById('input_15_day').value.trim();
    const birthYear = document.getElementById('input_15_year').value.trim();
    const streetAddress = document.getElementById('input_45_addr_line1').value.trim();
    const city = document.getElementById('input_45_city').value.trim();
    const state = document.getElementById('input_45_state').value.trim();
    const postCode = document.getElementById('input_45_postal').value.trim();
  
    // Define regex patterns
    const nameRegex = /^[a-zA-Z\s]+$/;
    const studentNumberRegex = /^\d+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[^\w\s]).{8,}$/;
    // const phoneNumberRegex = /^\(\d{3}\) \d{3}-\d{4}$/;
    const addressPattern = /^[A-Za-z0-9\s]+$/;
    const cityPattern = /^[A-Za-z\s]+$/;
    const statePattern = /^[A-Za-z\s]+$/;
    const postalCodePattern = /^[A-Za-z0-9\s]+$/;
  
    // Validate each field using regex patterns
    if (!nameRegex.test(firstName)) {
      window.alert('Please enter a valid first name');
      return;
    }
  
    if (!nameRegex.test(lastName)) {
        window.alert('Please enter a valid last name');
      return;
    }
  
    if (!studentNumberRegex.test(studentNumber)) {
        window.alert('Please enter a valid student number');
      return;
    }
  
    if (!emailRegex.test(email)) {
        window.alert('Please enter a valid email address');
      return;
    }
  
    // if (!passwordRegex.test(password)) {
    //     window.alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit');
    //   return;
    // }
  
    // if (!phoneNumberRegex.test(phoneNumber)) {
    //     window.alert('Please enter a valid phone number in the format (000) 000-0000');
    //   return;
    // }
  
    if (birthMonth === '') {
        window.alert('Please select a birth month');
      return;
    }
  
    if (!addressPattern.test(streetAddress)) {
        window.alert('Please enter a valid street address');
      return;
    }
  
    if (!cityPattern.test(city)) {
        window.alert('Please enter a valid city');
      return;
    }
  
    if (!statePattern.test(state)) {
        window.alert('Please enter a valid state/province name.');
      return;
    }
  
    if (!postalCodePattern.test(postCode)) {
        window.alert('Please enter a valid postal/zip code.');
      return;
    }
  
    // Store the email in local storage
    localStorage.setItem('email',JSON.stringify(email));
    localStorage.setItem('password',JSON.stringify(password))

    const retrievedData = JSON.parse(localStorage.getItem('email'));
    console.log(retrievedData);
    const passwordData = JSON.parse(localStorage.getItem('password'))
    console.log(passwordData)
    window.location.href = 'index.html';
   
  }
  
  
  
document.querySelector('#registrationForm').addEventListener('submit', function (event) {
    event.preventDefault();
    validateRegistrationForm(event);
  });
  


//   <!--==================login validation==============--!>
