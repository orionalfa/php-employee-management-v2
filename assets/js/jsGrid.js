console.log(baseURL);
$("#employeesList").jsGrid({
  height: "85vh",
  width: "100%",

  inserting: true,
  //   filtering: true,
  editing: false,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 15,
  pageButtonCount: 3,
  deleteConfirm: "Do you confirm you want to delete employee?",

  controller: {
    loadData: function (filter) {
      return $.ajax({
        type: "GET",
        url: baseURL + "employees/getAll",
        data: filter,
        dataType: "json",
        success: function (url) {
          console.log(url);
        },
      });
    },
    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: baseURL + "employees/handleData",
        data: item,
      });
    },
    insertItem: function (item) {
      return $.ajax({
        type: "POST",
        url: baseURL + "employees/handleData",
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
      width: 100,
    },
    {
      name: "lastName",
      validate: "required",
      title: "Last Name",
      type: "text",
      align: "",
      width: 100,
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
      name: "gender",
      validate: "required",
      title: "Gender",
      type: "text",
      align: "",
      width: 70,
    },
    {
      name: "streetAddress",
      title: "Street No.",
      type: "text",
      align: "",
      width: 150,
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
