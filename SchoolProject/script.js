const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const formData = new FormData();
formData.append('name', 'John Doe');
formData.append('email', 'john@example.com');
formData.append('password', 'securepassword');
formData.append('operation', 'register'); // specify the operation

// Make a POST request to the PHP script
fetch('index.php', {
  method: 'POST',
  body: formData
})
  .then(response => response.text())
  .then(data => {
    console.log(data); // Handle the response from the server
  })
  .catch(error => {
    console.error('Error:', error);
  });