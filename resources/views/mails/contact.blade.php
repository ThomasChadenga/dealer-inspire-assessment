You received a contact response.

<p><b>First Name:</b> {{$contact->firstname}}</p>
<p><b>Last Name:</b> {{$contact->lastname}}</p>
<p><b>Email:</b> {{$contact->email}}</p>
<p><b>Phone:</b> {{$contact->phone ?? ''}}  </p>
<p><b>Message:</b> {{$contact->message}}</p>