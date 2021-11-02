<style>
  .rate-form {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
  }

  .rate-form input[type=radio] {
    display: none;
  }

  .rate-form label {
    position: relative;
    padding: 0 5px;
    color: #ccc;
    cursor: pointer;
    font-size: 35px;
  }

  .rate-form label:hover {
    color: #ffcc00;
  }

  .rate-form label:hover~label {
    color: #ffcc00;
  }

  .rate-form input[type=radio]:checked~label {
    color: #ffcc00;
  }
</style>
