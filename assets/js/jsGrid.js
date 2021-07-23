$("#employeesList").jsGrid({
  height: "85vh",
  width: "100%",

  editing: false,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 15,
  pageButtonCount: 3,
  deleteConfirm: "Do you confirm you want to delete employee?",

  controller: {
    loadData: function () {
      return $.ajax({
        type: "GET",
        url: ``,
      });
    },
    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: ``,
        data: item,
      });
    },
  },

  fields: [
    {
      name: "name",
      validate: "required",
      title: "Name",
      type: "text",
      align: "",
      width: 150,
    },
    {
      name: "email",
      validate: "required",
      title: "Email",
      type: "text",
      align: "",
      width: 200,
    },
    {
      name: "age",
      validate: function (value) {
        return value > 0;
      },
      title: "Age",
      type: "text",
      align: "",
      width: 50,
    },
    {
      name: "streetAddress",
      title: "Street No.",
      type: "number",
      align: "",
      width: 100,
    },
    { name: "city", title: "City", type: "text", align: "", width: 100 },
    { name: "state", title: "State", type: "text", align: "", width: 50 },
    {
      name: "postalCode",
      title: "Postal Code",
      type: "number",
      align: "",
      width: 100,
    },
    {
      name: "phoneNumber",
      title: "Phone Number",
      type: "number",
      align: "",
      width: 200,
    },
    {
      type: "control",
      modeSwitchButton: false,
      editButton: false,
      headerTemplate: function () {
        return $("<button>")
          .attr("type", "button")
          .attr("class", "jsgrid-button jsgrid-insert-button")
          .on("click", function () {
            //   createNewEmployee();
          });
      },
      width: 100,
    },
  ],
  rowClick: function (item) {
    //   editEmployee(item);
  },
});
