
logout()
function logout() {
  window.localStorage.clear()
}
function close0() {
  document.getElementById("exampleModal").style.display = "none"
  document.getElementById("exampleModal").className += "none"
}
function close1() {
  document.getElementById("exampleModalCenter1").style.display = "none"
  document.getElementById("exampleModalCenter1").className += "none"
}
function close2() {
  document.getElementById("exampleModalforgot").style.display = "none"
  document.getElementById("exampleModalforgot").className += "none"
}
function close3() {
  document.getElementById("exampleModalSetpass").style.display = "none"
  document.getElementById("exampleModalSetpass").className += "none"
}
function close4() {
  document.getElementById("exampleModalCenterEmail").style.display = "none"
  document.getElementById("exampleModalCenterEmail").className += "none"
}
function validate() {
  var form = document.getElementById('form')
  form.addEventListener('submit', function (event) {
    event.preventDefault();
  })
  openModal()
}

function openModal() {
  var email = document.getElementById('email').value
  var password = document.getElementById('password').value

  const re = /\S+@[A-Za-z]+\.com/;
  const ks = /\S+@[A-Za-z]+\.co.in/;
  var emailError = ""
  if (!re.test(email) && !ks.test(email)) {

    emailError = "Please enter the valid email"
  } else {
    emailError = ""
  }
  if (email == "" || password == "" || (emailError !== "")) {
    if (email !== "" && password !== "") {
      window.alert("Please enter the valid email");


    }
  } else {

    let data = {
      email: email,
      password: password,

    }
    const url = 'http://52.255.170.184:8008/api/balbhas/preLogin/SignIn'
    fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
      headers: { "Content-type": "application/json; charset=UTF-8" }
    }).then(function (response) {
      if (response.ok) {

        return response.json();

      }
      return Promise.reject(response);
    }).then(function (data) {
      if (JSON.stringify(data.success) == 'true') {
        window.localStorage.setItem("accessToken", data.accessToken);
        document.getElementById("exampleModal").style.display = "block"
        document.getElementById("exampleModal").className += "show"
        getotp();
      }
      else if (data.message == 'E102') {
        alert('Email is seems to non resource manager')
        document.getElementById("exampleModal").style.display = "block"
        document.getElementById("exampleModal").className += "none"


      }
      else if (data.message == 'E103') {
        alert('Entered password is wrong')

        document.getElementById("exampleModal").className += "none"


      }
      else if (data.success == 'false') {

        document.getElementById("exampleModal").className += "none"

      }


    }).catch(function (error) {
      alert("Something went wrong. Please try again!")
      console.warn('Something went wrong.', error);
    });

  }

}


function getotp() {


  var email = document.getElementById('email').value
  let otpvalue = {
    email: email,
  }


  const url1 = 'http://52.255.170.184:8008/api/balbhas/postLogin/verifyEmail'
  fetch(url1, {
    method: 'POST',
    body: JSON.stringify(otpvalue),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
      redirect(otpvalue.otp);

    }
    return Promise.reject(response);
  }).then(function (otpvalue) {
    // document.getElementById("modalbtn").setAttribute("data-toggle", "modal")
    // document.getElementById("modalbtn").setAttribute("data-target", "#exampleModal")


    document.getElementById("modalbtn").setAttribute("data-toggle", "modal")
    document.getElementById("modalbtn").setAttribute("data-target", "#exampleModal")
  }


  ).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);
  });

}


function redirect(otpvalue) {
  var email = document.getElementById('email').value
  var otp = document.getElementById('otp').value

  var url2 = 'http://52.255.170.184:8008/api/balbhas/postLogin/validateOtp'

  let otpvalue1 = {
    email: email,
    otp: otp,
  }
  fetch(url2, {

    method: 'POST',
    body: JSON.stringify(otpvalue1),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (otpvalue1) {
    if (otpvalue1.success == true && otp.length == 6) {
      window.location.href = 'postupdate.html';
    }
    else if (otpvalue1.status == "400") {
      alert("Enter OTP required")

    }
    else if (otpvalue1.message == "E104") {
      alert("Entered OTP number is Expired")
    }
    else if (otpvalue1.message == "E106") {
      alert("Entered OTP is wrong.")
    }
    else if (otpvalue1.message == "E105") {
      alert("Unable to generate OTP number count exceeded.try again")
      window.location.reload();
    }

  }).catch(function (error) {
    alert("Something went wrong. Please try again!")
  });

  if (otpvalue1.success == true && otp.length == 6) {
    window.location.href = 'postupdate.html';
  }
  else if (otp.length < 6 || otp.length == " ") {
    alert("enter 6 digit OTP number")

  }

}


function resend() {
  var url4 = 'http://52.255.170.184:8008/api/balbhas/postLogin/resendOtp'
  var email = document.getElementById('email').value
  let otpvalue2 = {
    email: email,
  }

  fetch(url4, {

    method: 'POST',
    body: JSON.stringify(otpvalue2),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (otpvalue2) {
    if (otp.length == 6 && otpvalue2.success == true) {
      window.location.href = 'postupdate.html';
    }
    else if (otpvalue2.message == "E104") {
      alert("Entered OTP number is Expired")
    }
    else if (otpvalue2.message == "E106") {
      alert("Entered OTP is wrong.")
    }
    else if (otpvalue1.message == "E105") {
      alert("Unable to generate OTP number count exceeded.try again")
      window.location.reload();
    }
  }).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);

  });

}

// for confirm password otp
function getotp1() {


  var email = document.getElementById('email1').value
  let otpvalue = {
    email: email,
  }
  const url1 = 'http://52.255.170.184:8008/api/balbhas/postLogin/verifyEmail'
  fetch(url1, {
    method: 'POST',
    body: JSON.stringify(otpvalue),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
      redirect(otpvalue.otp);
    }
    return Promise.reject(response);
  }).then(function (otpvalue) {

    document.getElementById("exampleModalCenterEmail").style.display = "none"
    document.getElementById("exampleModalCenterEmail").className += "none"
    document.getElementById("exampleModalforgot").style.display = "block"
    document.getElementById("exampleModalforgot").className += "show"
  }


  ).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);
  });

}

function resend1() {
  var url4 = 'http://52.255.170.184:8008/api/balbhas/postLogin/resendOtp'
  var email = document.getElementById('email1').value
  let otpvalue2 = {
    email: email,
  }

  fetch(url4, {

    method: 'POST',
    body: JSON.stringify(otpvalue2),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (otpvalue2) {
    if (otp.length == 6 && otpvalue2.success == true) {
      window.location.href = 'postupdate.html';
    }
    else if (otpvalue2.message == "E104") {
      alert("Entered OTP number is Expired")
    }
    else if (otpvalue2.message == "E106") {
      alert("Entered OTP is wrong.")
    }
    else if (otpvalue1.message == "E105") {
      alert("Unable to generate OTP number count exceeded.try again")
      window.location.reload();
    }
  }).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);

  });

}



function confirmpass(otpvalue) {
  var email = document.getElementById('email1').value
  var otp = document.getElementById('otp1').value

  var url2 = 'http://52.255.170.184:8008/api/balbhas/postLogin/validateOtp'

  let otpvalue1 = {
    email: email,
    otp: otp,
  }
  fetch(url2, {

    method: 'POST',
    body: JSON.stringify(otpvalue1),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (otpvalue1) {
    if (otpvalue1.success == true && otp.length == 6) {
      document.getElementById("exampleModalforgot").style.display = "none"
      document.getElementById("exampleModalforgot").className += "none"
      document.getElementById("exampleModalSetpass").style.display = "block"
      document.getElementById("exampleModalSetpass").className += "show"

    }
    else if (otpvalue1.status == "400") {
      alert("Enter OTP required")

    }
    else if (otpvalue1.message == "E104") {
      alert("Entered OTP number is Expired")
    }
    else if (otpvalue1.message == "E106") {
      alert("Entered OTP is wrong.")
    }
    else if (otpvalue1.message == "E105") {
      alert("Unable to generate OTP number count exceeded.try again")
      window.location.reload();
    }

  }).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);
  });

  if (otp.length == 6) {
    // window.location.href = 'postupdate.html';
  }
   if (otp.length < 6 || otp.length == " ") {
    alert("enter 6 digit OTP number")

  }


}

function setuppass() {


  var email = document.getElementById('email1').value
  var newPassword = document.getElementById('newpass').value
  var confirmPassword = document.getElementById('confirmpass').value
  if (newPassword == confirmPassword) {

    let resetPassword1 = {
      email: email,
      newPassword: newPassword,
    }
    const url1 = 'http://52.255.170.184:8008/api/balbhas/postLogin/resetPassword'
    fetch(url1, {
      method: 'POST',
      body: JSON.stringify(resetPassword1),
      headers: { "Content-type": "application/json; charset=UTF-8" }
    }).then(function (response) {
      if (response.ok) {
        return response.json();

      }
      return Promise.reject(response);
    }).then(function (response) {
      if (response.success == true) {
        document.getElementById("exampleModalSetpass").style.display = "none"
        document.getElementById("exampleModalSetpass").className += "none"
        alert("Password is Reset Successfully ");
        window.location.reload();
      }
    }


    ).catch(function (error) {
      alert("Something went wrong. Please try again!")
      console.warn('Something went wrong.', error);
    });

  }
  else {
    alert("New password & Confirm Password is Mismatch");
  }


}

function resend() {
  var url4 = 'http://52.255.170.184:8008/api/balbhas/postLogin/resendOtp'
  var email = document.getElementById('email').value
  let otpvalue2 = {
    email: email,
  }

  fetch(url4, {

    method: 'POST',
    body: JSON.stringify(otpvalue2),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    }
    return Promise.reject(response);
  }).then(function (otpvalue2) {
    if (otp.length == 6 && otpvalue2.success == true) {
      window.location.href = 'postupdate.html';
    }
    else if (otpvalue2.message == "E104") {
      alert("Entered OTP number is Expired")
    }
    else if (otpvalue2.message == "E106") {
      alert("Entered OTP is wrong.")
    }
    else if (otpvalue1.message == "E105") {
      alert("Unable to generate OTP number count exceeded.try again")
      window.location.reload();
    }
  }).catch(function (error) {
    alert("Something went wrong. Please try again!")
    console.warn('Something went wrong.', error);

  });

}

