@include('partials/header')
<button class='turn-button '><a href="/">◄</a></button>  <h1 class='text'>Ihr Konto erstellen</h1>

  <form action="{{route('register')}}" method="POST">
    @csrf
    <div class='register-daten'>
      <label class='name-daten' for="name">Name:</label> 
      <input class='name' type="text" id="name" name="name"> 
      
      <label class='email-daten' for="email">Email:</label><br>
      <input class='email' type="email" id="email" name="email">
      
      <label class='password-daten' for="password">Passwort:</label><br>
      <input class ='password' type="password" id="password" name="password" >
    </div>
    <div class='datenschutz'>
      <input type="checkbox"  name="datenschutz" >
      <label class='datenschutz-text'>Ich akzeptiere die Datenschutzbestimmung</label>
    </div>
    <div class='register-button'>
    <button class ='register-button__link' type="submit">Registrieren</button>
    </div>
  </form>

  <h2 class='text'>Sind Sie bereits registriert?<br><a href="/login" > Hier anmelden</a>


  @include('partials/footer')
