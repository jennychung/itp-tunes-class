<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Editor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>


@extends('layout')
@section('title', 'Editor')
<!-- this is to change the title to "Invoices" to make it dynamic!-->
@section('main')


  <b> TALK HERE </b>

  <div id="chat"> </div>
  <br>

  <div contenteditable="true" id="textEdit" style="border-style: solid; border-width: 1px; padding: 10px;">
  Type Here...
</div>



  <script type="text/javascript">

  let connection = new WebSocket('ws://localhost:8080');

  connection.onopen = () => {
    console.log('connected from front end');
    // connection.send('hello');
  };

  connection.onerror = () => {
    console.log('failed to connect front end');
  };

  connection.onmessage = (event) => {
    console.log('received message', event.data);
    let li = document.createElement('p');
    li.innerText = event.data;
    document.getElementById('chat').innerHTML = "";
    document.getElementById('chat').append(li);
  };

  document.getElementById('textEdit').addEventListener("input", (event) => {
    event.preventDefault();

    let message = document.getElementById('textEdit').innerText;
    connection.send(message);
    // document.querySelector('div').innerText = '';
  });


  </script>

@endsection
</html>
