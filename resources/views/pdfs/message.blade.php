<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sewing Company</title>
    <link rel="stylesheet" href="css/pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logopdf.png">
      </div>
      <div id="company">
        <h2 class="name">Sewing Company</h2>
        <div>Hay El hanae1 Andalous, Tangier, Morocco</div>
        <div>(212) 623555309</div>
        <div><a href="#">Abdennour@merghad.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Email Of:</div>
          <h2 class="name">The Administrator</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="#">abdnorsmi@gmail.com</a></div>
        </div>
        <div id="invoice">
          <h1>Sent Emails</h1>
          <div class="date">Date of Creation: {{ $message->created_at }}</div>
          <div class="date">Apdated At : {{ $message->updated_at }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">N°</th>
            <th class="desc">Message</th>
            <th class="unit">Title</th>
            <th class="qty">Email</th>
            <th class="total">Admin</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc">{!! $message->message !!}</td>
            <td class="unit">{{ $message->subject }}</td>
            <td class="qty">{{ $message->email }}</td>
            <td class="total">Abdnor</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">EMAIL ID</td>
            <td>{{$message->id}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">The backend of the application was created by the web developer Merghad Abdennour.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
