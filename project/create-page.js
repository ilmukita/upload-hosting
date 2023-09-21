document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("dynamic-form");
  const addFieldButton = document.getElementById("add-field");
  const containerAction = document.getElementById("container-action");

  console.info(containerAction);

  addFieldButton.addEventListener("click", function () {
    const fieldContainer = document.createElement("div");
    fieldContainer.classList.add("container-field");

    const nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.classList.add("input");
    nameInput.name = "name[]";
    nameInput.placeholder = "Name...";

    const addressInput = document.createElement("input");
    addressInput.type = "text";
    addressInput.classList.add("input");
    addressInput.name = "address[]";
    addressInput.placeholder = "Address...";

    const removeButton = document.createElement("button");
    removeButton.classList.add("btn", "btn-remove");
    removeButton.textContent = "Remove";

    removeButton.addEventListener("click", function () {
      form.removeChild(fieldContainer);
    });

    fieldContainer.appendChild(nameInput);
    fieldContainer.appendChild(addressInput);
    fieldContainer.appendChild(removeButton);
    form.insertBefore(fieldContainer, containerAction);
  });

  document.addEventListener("click", function (event) {
    if (event.target && event.target.classList.contains("remove-field")) {
      const fieldContainer = event.target.parentNode;
      form.removeChild(fieldContainer);
    }
  });
});
