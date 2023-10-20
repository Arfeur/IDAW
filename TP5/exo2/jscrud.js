const table = $("#myTable").DataTable();

function createUser(event) {
  event.preventDefault();
  let name = $("#inputNom").val();
  let email = $("#inputMail").val();

  let data = {
    name: name,
    email: email,
  };

  data = JSON.stringify(data);

  $.ajax({
    //L'URL de la requête
    url: "http://localhost/IDAW/TP4/APIRest/product/create.php",

    //La méthode d'envoi (type de requête)
    method: "POST",

    //Le format de réponse attendu
    dataType: "json",

    data: data,
  });
  $("#inputMail").val("");
  $("#inputNom").val("");
  displayUsers();
}

async function readUser() {
  const response = await $.ajax({
    //L'URL de la requête
    url: "http://localhost/IDAW/TP4/APIRest/product/read.php",

    //La méthode d'envoi (type de requête)
    method: "GET",

    //Le format de réponse attendu
    dataType: "json",
  });

  return response.records;
}

async function updateUser(id) {
  let user = {
    id: id,
  };

  const response = await $.ajax({
    //L'URL de la requête
    url: "http://localhost/IDAW/TP4/APIRest/product/read_one.php",

    //La méthode d'envoi (type de requête)
    method: "GET",

    //Le format de réponse attendu
    dataType: "json",

    data: user,
  });

  let newName = prompt("Entrez le nouveau nom", response.name);
  let newEmail = prompt("Entrez le nouveau mail", response.email);

  let data = {
    id: id,
    name: newName,
    email: newEmail,
  };

  data = JSON.stringify(data);

  await $.ajax({
    //L'URL de la requête
    url: "http://localhost/IDAW/TP4/APIRest/product/update.php",

    //La méthode d'envoi (type de requête)
    method: "POST",

    //Le format de réponse attendu
    dataType: "json",

    data: data,
  });
  displayUsers();
}

async function deleteUser(id) {
  let data = {
    id: id,
  };

  data = JSON.stringify(data);

  await $.ajax({
    //L'URL de la requête
    url: "http://localhost/IDAW/TP4/APIRest/product/delete.php",

    //La méthode d'envoi (type de requête)
    method: "DELETE",

    //Le format de réponse attendu
    dataType: "json",

    data: data,
  });
  displayUsers();
}

async function displayUsers() {
  table.clear();
  const users = await readUser();
  console.log(users);
  users.map((user) => {
    table.row.add([
      user.id,
      user.name,
      user.email,
      "<button class='deleteButton' onclick='deleteUser(" +
        user.id +
        ");'>Delete</button><button class='updateButton' onclick='updateUser(" +
        user.id +
        ");'>Update</button>",
    ]);
  });

  table.draw();
}

$(document).ready(function () {
  displayUsers();
});
