//ADMIN JS

//JavaScript to display real-time date and time

function updateRealTimeDate() {
    const dateElement = document.getElementById('real-time-date');
    const now = new Date();
    const options = { 
      weekday: 'long', 
      year: 'numeric', 
      month: 'long', 
      day: 'numeric', 
      hour: '2-digit', 
      minute: '2-digit', 
      second: '2-digit' 
    };
    const formattedDate = now.toLocaleDateString('en-US', options);
    dateElement.textContent = formattedDate;
  }

  // Update the date and time every second
  setInterval(updateRealTimeDate, 1000);

  // Initialize the date and time on page load
  updateRealTimeDate();





//UPDATE BOOK JS

document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#booksTable tbody");
    const pagination = document.querySelector("#pagination");
    const searchInput = document.querySelector("#searchInput");
    const searchButton = document.querySelector("#searchButton");

    // Sample data
    const books = [
        { id: 101, title: "The Critique of Pure Reason", author: "Immanuel Kant", isbn: "978-0521657297", genre: "Philosophy", quantity: 10 },
        { id: 102, title: "Stroller", author: "Annando Perario", isbn: "978-1234567890", genre: "Fiction", quantity: 5 },
        { id: 103, title: "The Design of Everyday Things", author: "Don Norman", isbn: "978-0465050659", genre: "Design", quantity: 8 },
        // Add more books here...
    ];

    let currentPage = 1;
    const rowsPerPage = 10;

    // Render table rows
    function renderTable(page, data) {
        tableBody.innerHTML = "";
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const paginatedData = data.slice(start, end);

        paginatedData.forEach(book => {
            const row = `
                <tr>
                    <td>${book.id}</td>
                    <td>${book.title}</td>
                    <td>${book.author}</td>
                    <td>${book.isbn}</td>
                    <td>${book.genre}</td>
                    <td>${book.quantity}</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-primary shadow btn-xs sharp me-1" onclick="editBook(${book.id})">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger shadow btn-xs sharp" onclick="deleteBook(${book.id})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }

    // Render pagination
    function renderPagination(data) {
        pagination.innerHTML = "";
        const pageCount = Math.ceil(data.length / rowsPerPage);

        for (let i = 1; i <= pageCount; i++) {
            const li = `
                <li class="page-item ${i === currentPage ? "active" : ""}">
                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                </li>
            `;
            pagination.insertAdjacentHTML("beforeend", li);
        }
    }

    // Change page
    window.changePage = function (page) {
        currentPage = page;
        renderTable(page, books);
        renderPagination(books);
    };

    // Search functionality
    searchButton.addEventListener("click", function () {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredBooks = books.filter(book =>
            book.title.toLowerCase().includes(searchTerm) ||
            book.author.toLowerCase().includes(searchTerm) ||
            book.genre.toLowerCase().includes(searchTerm)
        );
        renderTable(1, filteredBooks);
        renderPagination(filteredBooks);
    });

    // Edit book
    window.editBook = function (id) {
        const book = books.find(book => book.id === id);
        alert(`Edit book: ${book.title}`);
        // Add your edit logic here
    };

    // Delete book
    window.deleteBook = function (id) {
        if (confirm("Are you sure you want to delete this book?")) {
            const index = books.findIndex(book => book.id === id);
            books.splice(index, 1);
            renderTable(currentPage, books);
            renderPagination(books);
        }
    };

    // Initial render
    renderTable(currentPage, books);
    renderPagination(books);
});





  //UPDATEUSERS JS

  document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#usersTable tbody");

    // Fetch users from the server
    async function fetchUsers() {
        const response = await fetch('/api/users');
        const users = await response.json();
        return users;
    }

    // Render users in the table
    function renderTable(users) {
        tableBody.innerHTML = ""; // Clear existing rows
        users.forEach(user => {
            const row = `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.role}</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-primary shadow btn-xs sharp me-1" onclick="editUser(${user.id})">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger shadow btn-xs sharp" onclick="deleteUser(${user.id})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }

    // Edit user (placeholder function)
    window.editUser = function (id) {
        alert(`Edit user with ID: ${id}`);
        // Add your edit logic here
    };

    // Delete user (placeholder function)
    window.deleteUser = function (id) {
        if (confirm("Are you sure you want to delete this user?")) {
            fetch(`/api/users/${id}`, { method: 'DELETE' })
                .then(() => {
                    fetchUsers().then(users => renderTable(users));
                });
        }
    };

    // Initial render
    fetchUsers().then(users => renderTable(users));
});