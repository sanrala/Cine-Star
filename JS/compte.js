
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDopEBR4bbjewi6lvSlirK49p59JMcGTec",
    authDomain: "cinestars-aa75e.firebaseapp.com",
    projectId: "cinestars-aa75e",
    storageBucket: "cinestars-aa75e.appspot.com",
    messagingSenderId: "580492067329",
    appId: "1:580492067329:web:4b257ed89a531cfdf03600"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);


  import {getDatabase,get, ref, set, child, update, remove}
  from "https://www.gstatic.com/firebasejs/9.8.3/firebase-database.js"

  const db = getDatabase();

// BOUTON CONNECT HEADER
  document.getElementById("myBtn").onmouseover = function () { myFunction() };
function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
  }
// FIN BOUTON CONNECT HEADER

  //LOGIN

  let nameB = document.querySelector('#nameB');
  let passB = document.querySelector('#passB');
  const signUp = document.querySelector('.signUp')
  let signBtn = document.querySelector('#sign');
  const login = document.querySelector('#dnoneLogin')
  signBtn.addEventListener('click', (event) => {
      event.preventDefault()
     
      signUp.style.display = "block"
      
    login.style.display = 'none'
    p.style.display = 'none'
  })
  
  // FIn Formulaire inscription
  
  let admi = [];
  let valueName, valuePassword;
  let compteur = 0;
  function getAllUsers() {
      const allUsers = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/users.json')
      .then(
          async response => {
              try {
                  admi = await response.json();
                  console.log(admi);
              } catch (error) {
                  console.log(error);
              }
          }
      )
  }
  
  
  const ulLogin = document.querySelector('.passError');
  const liLogin = document.createElement('li')
  
  login.addEventListener('submit', (event) => {
      event.preventDefault();
      liLogin.innerText = ""
      valueName = document.querySelector('input[type = "text"]')
      valuePassword = document.querySelector('input[type = "password"]')
      console.log(valueName.value);
      console.log(valuePassword.value);
  
      let isLoggedIn = admi.filter(value => value.user == valueName.value && value.password == valuePassword.value)
      console.log(isLoggedIn);
  
      if (isLoggedIn.length > 0) {
          location.assign('admin.html')
      } else {
          liLogin.innerText = "Pseudo et/ou Mot de passe incorrects"
          liLogin.style.color = 'red'
          ulLogin.append(liLogin);
          valueName.value = "";
          valuePassword.value = "";
          compteur++;
          if (compteur == 3) {
              liLogin.innerHTML ="";
              liLogin.innerText = "Nombres d'essais atteints, veuillez attendre 2 minutes"
              valueName.disabled = true;
              valuePassword.disabled = true;
              setTimeout(() => {
                  valueName.disabled = false;
                  valuePassword.disabled = false;
              }, 120000);
          }
      }
  })
  
  getAllUsers()


//   FIN LOGIN

const pass = document.querySelector('#pass')
const admin = document.querySelector('.admin')

const p = document.querySelector('.text')
const btnIns = document.querySelector('#btnIns')



// function connect() {


    

// }

//Formulaire inscription

// REGEX


btnIns.addEventListener('click', (e) => {
    e.preventDefault()
    let password = document.querySelector("#userPassword").value;
    let name = document.querySelector("#userSign").value;
    let mail = document.querySelector("#userMail").value;

    let error1 = document.querySelector('#error1')
    let error2 = document.querySelector('#error2')
    let error3 = document.querySelector('#error3')
    let error4 = document.querySelector('#error4')

    const li = document.querySelector('.userSign')
    const liPass = document.querySelector('.userPassword')
    const liMail = document.querySelector('.userMail')
    error1.innerText = ''
    error2.innerText = ''
    error3.innerText = ''
    error4.innerText = ''
    li.innerText=''
    liPass.innerText=''
    liMail.innerText=''


    if (password.length < 8) {
        
        error1.innerText += 'Inclure 8 caractères minimum'
        error1.style.color = 'red'
       
    }
    if (name.length < 2) {
        li.innerText=''
        li.innerText += 'Inclure 2 caractères minimum'
        li.style.color = 'red'
       
    }
    if (/[A-Z]/g.test(password) == false) {

        error2.innerText += 'inclure une lettre en capitale'
        error2.style.color = 'red'
    }
 

    if (/\d/g.test(password) == false) {

        error3.innerText += 'inclure un chiffre'
        error3.style.color = 'red'
    }



    if (/[!%&|-~§=+:^$*+?{}()]/g.test(password) == false) {

        error4.innerText += 'inclure un symbole'
        error4.style.color = 'red'
    }


    if (name == '') {
        li.innerText=''
li.innerText = " Nom / pseudo manquant"
li.style.color = 'red'

      

    } 
    if (password == '') {

        liPass.innerText = " Mot de passe manquant"
        liPass.style.color = 'red'
        
              
        
            }
            if (mail == '') {

                liMail.innerText = " Email manquant"
                liMail.style.color = 'red'
                
           
                
                    }

    if ((/[A-Z]/g.test(password) == true) && (password.length >= 8)
        && (/\d/g.test(password) == true) && (/[!%&|-~§=+:^$*+?{}()]/g.test(password) == true)
        && (name.length >= 1)) {

            function insertData() {
    
                set(ref(db, "users/" + 0), {
                        name: userSign.value,
                        mail: userMail.value,
                        password: userPassword.value,
                    
                    
                        })
                       
               
                const users = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/users.json')
              .then (async response => {
                  try {
                      const allMyUser = await response.json();
                      let filterUser = allMyUser.filter(f => f !== null)
                      console.log(filterUser);
                      console.log(allMyUser.length);
                    set(ref(db, "users/" + allMyUser.length), {
                        name: userSign.value,
                        mail: userMail.value,
                        password: userPassword.value,
                      
                       
                        })
                  } catch(e) {
                     
                  }
              })
            .then(() => {
                alert('data inserted')
            })
            .catch((err) => {
                alert('Error : ') + err
            })
              }
          
          
          btnIns.addEventListener('click', insertData);
    }

});

//FIN REGEX


