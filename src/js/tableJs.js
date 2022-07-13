"use strict"

document.addEventListener('DOMContentLoaded', () => {


  document.getElementById("btnInsertForm").addEventListener("click", toggleInsertUser)
  document.getElementById("btnReturn").addEventListener("click", () => {
    toggleInsertUser();

  });
  let borrarCancelar = document.getElementsByName("borrarCancelar")
  borrarCancelar.forEach(element => {

    
    element.addEventListener("click", () => {
      toggleBorrar(element.title);

    });
  });
  let borrarElements = document.getElementsByName("borrar")
  borrarElements.forEach(element => {

    
    element.addEventListener("click", () => {
      toggleBorrar(element.title);

    });
  });
  function toggleInsertUser(e) {
    e.preventDefault();
    document.getElementById("createUser").classList.toggle("createUser");
    document.getElementById("btnInsertForm").classList.toggle("createUser");


  }
  function toggleBorrar(params) {
    document.getElementById(params).classList.toggle("createUser");

  }

});