// Function to validate the form fields
function validateForm(event) {
    event.preventDefault(); // Prevent form submission for validation

    let isValid = true;

    // Check if the First Name is empty
    const firstName = document.getElementById('firstName');
    const firstNameError = document.getElementById('firstNameError');
    if (firstName.value.trim() === '') {
        firstNameError.style.display = 'block';
        firstNameError.innerHTML = 'Please enter your first name';
    } else {
        firstName.classList.remove('is-invalid');
        firstNameError.style.display = 'none';
    }

    // Check if the Last Name is empty
    const lastName = document.getElementById('lastName');
    const lastNameError = document.getElementById('lastNameError');
    if (lastName.value.trim() === '') {
        lastNameError.style.display = 'block';
        lastNameError.innerHTML = 'Please enter your last name';
    } else {
        lastName.classList.remove('is-invalid');
        lastNameError.style.display = 'none';
    }

    // Check if the Age is empty
    const age = document.getElementById('age');
    const ageError = document.getElementById('ageError');
    
    if (age.value.trim() === '') {
        ageError.style.display = 'block';        
       ageError.innerHTML = 'Please enter your age';
        isValid = false;
    }
    else if(typeof (age.value) !== 'number') {
        ageError.style.display = 'block';        
        ageError.innerHTML = 'Age must be a number. Please enter a valid value';
    }
    else {
        age.classList.remove('is-invalid');
        ageError.style.display = 'none';
    }

    // If the form is valid, submit it
    if (isValid) {
        clearFormErrors();
        document.getElementById('studentForm').submit();
    }
}

// Attach event listener to form submission
document.getElementById('studentForm').addEventListener('submit', validateForm);

function clearFormErrors(){
    document.getElementById('firstNameError').style.display = 'none';
    document.getElementById('lastNameError').style.display = 'none';
    document.getElementById('ageError').style.display = 'none';

}


//Update the student fields
function populateUpdateForm(id, firstName, lastName, age) {
    console.log(id, firstName, lastName, age);
    document.getElementById("studentId").value = id;
    document.getElementById('firstName').value = firstName;
    document.getElementById('lastName').value = lastName;
    document.getElementById('age').value = age;
}

//delete the form 
function populateDeleteForm(studentId) {
    // Set the student ID in the hidden input field in the delete modal
    document.getElementById('studentId').value = studentId;
}
