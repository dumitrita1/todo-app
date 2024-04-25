@include('partials/header')

<button class='turn-button '><a href="/">◄</a></button>
@if(session()->has('success'))
<p class='successfully-registered'>{{session('success')}}</p>
@endif
  <h1 class = 'text'>Login</h1>
  <form  method="POST" action="{{ route('login') }}">
  @csrf
    <div class= 'login-daten'>
      <label class='email-daten' for="email">Email:</label>
      <input class= 'email' type="email" id="email" name="email">
      
      <label  class='password-daten' for="password">Passwort:</label>
      <input class= 'password' type="password" id="password" name="password">
    </div>
    <div class='login-button'>
      <button class ='login-button__link' type="submit">Anmelden</button>
    </div>
  </form>

  <h2 class ='password-text__forgot'>Sie haben Ihr Passwort vergessen?</h2>


  <img class ='img-login'src="/img/notebook-with-stick.png" alt="Notebook with stick">

  <script>
    function addInput() {
        var container = document.getElementsByClassName('task-form')[0];
        var newInput = document.createElement('div');
        newInput.innerHTML = '<label class="name-daten">Name:</label> <input type="text" name="name">';
        container.appendChild(newInput);
    }
  </script>

  @include('partials/footer')
