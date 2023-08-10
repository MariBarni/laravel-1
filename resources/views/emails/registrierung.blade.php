@component('mail::message')
<p>Liebe Leserin, lieber Leser,</p>
<p>dies ist eine Informationsmail. Um Ihre Registrierung abzuschließen und Ihre Daten zu aktualisieren, folgen Sie bitte dem nachfolgenden Link.</p>
  @component('mail::button', ['url' => $url])
  Konto Aktualisieren
  @endcomponent
  <p> Oder melden Sie sich mit Ihrem Email Adresse als Benutzername und den Register Code als Kenntwort.

<div>
Register Code:{{ $token }}
</div>

Dieser Link ist nur bis zum {{ $expires_at }} gültig. Danach müssen Sie die Registrierung für Ihre Lebenslauf erneut durchführen. Ihr bisherige Daten werden dann gelöscht.
Hinweis: Sollte der Link nicht funktionieren, rufen Sie bitte die Webseite "" auf.</p>
<p>Es grüßt Sie herzlich</p>

<p>Ihr Stimme.de-Team.</p>
@endcomponent
                      