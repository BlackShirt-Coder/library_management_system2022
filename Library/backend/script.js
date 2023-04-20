
var content = document.querySelector(".content");
var register = document.querySelector(".register");
var dashboard = document.querySelector(".dashboard");
var addCate = document.querySelector(".addCate");
var addAuthor = document.querySelector(".addAuthor");
var manageAuthor = document.querySelector(".manageAuthor");
var manageCate = document.querySelector(".manageCate");
var addBook = document.querySelector(".addBook");
var manageBook = document.querySelector(".manageBook");
var addIssue = document.querySelector(".addIssue");
var requestBook = document.querySelector(".requestBook");
var returnBook = document.querySelector(".returnBook");
var changePassword = document.querySelector(".changePassword");
var logout = document.querySelector(".logout");

var page;

function load(page) {
    $.ajax({
        type: "POST",
        url: page,
        success: function (msg) {
            content.innerHTML = msg;
        },
        fail: function () {
            alert("failure");
        }
    })
}

dashboard.parentElement.onclick = function () {
    window.location="index.php";



};
register.parentElement.onclick = function () {
    window.location="reg-students.php";

};
addCate.parentElement.onclick = function () {
   window.location="add-category.php";

};
manageCate.parentElement.onclick = function () {
    window.location="manage-categories.php";

};
addAuthor.parentElement.onclick = function () {
    window.location = "add-author.php";

};

manageAuthor.parentElement.onclick = function () {
    window.location="manage-authors.php";

};
manageBook.parentElement.onclick = function () {
    window.location="manage-books.php";

};
addBook.parentElement.onclick = function () {
    window.location = "add-book.php";

 };
addIssue.parentElement.onclick = function () {
    window.location="issue-book.php";
};
requestBook.parentElement.onclick = function () {
    window.location="request-book.php";


};
returnBook.parentElement.onclick = function () {
    window.location="manage-issued-books.php";
};
changePassword.parentElement.onclick = function () {
    window.location="change-password.php";
};
logout.parentElement.onclick = function () {
    window.location="logout.php";
};

