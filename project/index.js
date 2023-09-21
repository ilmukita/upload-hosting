document.addEventListener("DOMContentLoaded", function () {
  const buttonEdit = document.querySelectorAll("button[role='button-edit']");
  const buttonRemove = document.querySelectorAll(
    "button[role='button-remove']"
  );

  const formEdit = document.getElementById("form-edit");
  const formRemove = document.getElementById("form-remove");

  buttonEdit.forEach((element) => {
    element.addEventListener("click", (event) => {
      const id = event.target.getAttribute("data-id");
      if (!formEdit) {
        console.error("Form edit: not found");
        return;
      }
      if (!id) {
        console.error("Id: not found");
        return;
      }
      const input = formEdit.querySelector('input[name="id"]');
      if (!input) {
        console.error("Form input: not found");
        return;
      }
      input.setAttribute("value", id);
      formEdit.submit();
    });
  });

  buttonRemove.forEach((element) => {
    element.addEventListener("click", (event) => {
      const id = event.target.getAttribute("data-id");
      if (!formRemove) {
        console.error("Form delete: not found");
        return;
      }
      if (!id) {
        console.error("Id: not found");
        return;
      }
      const input = formRemove.querySelector('input[name="id"]');
      if (!input) {
        console.error("Form input: not found");
        return;
      }
      input.setAttribute("value", id);
      formRemove.submit();
    });
  });
});
