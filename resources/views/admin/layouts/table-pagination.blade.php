<style>
.pagination {
    display: flex;
    list-style: none;
    gap: 5px;
    padding-left: 0;
}
.pagination li {
    border: 1px solid #dee2e6;
    padding: 4px 10px;
    cursor: pointer;
    font-size: 0.85rem;
    border-radius: 4px;
    background-color: #fff;
}
.pagination li.active {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}
.pagination li:hover:not(.active) {
    background-color: #f8f9fa;
}
</style>

<div id="paginationContainer" class="mt-3"></div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('searchInput');
    const entriesSelect = document.getElementById('entriesCount');
    const table = document.querySelector('.data-table');
    const paginationContainer = document.getElementById('paginationContainer');
    if (!table) return;

    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // Ambil setting terakhir dari localStorage
    const savedEntries = localStorage.getItem('entriesCount');
    if (savedEntries) {
        entriesSelect.value = savedEntries;
    }
    let currentPage = parseInt(localStorage.getItem('currentPage') || 1);

    function renderTable() {
        const searchValue = searchInput.value.toLowerCase();
        const maxEntries = parseInt(entriesSelect.value);

        // Filter rows sesuai pencarian
        const filteredRows = rows.filter(row =>
            row.textContent.toLowerCase().includes(searchValue)
        );

        const totalPages = Math.ceil(filteredRows.length / maxEntries);
        if (currentPage > totalPages) currentPage = totalPages || 1;

        // Tampilkan data sesuai halaman
        filteredRows.forEach((row, index) => {
            const start = (currentPage - 1) * maxEntries;
            const end = start + maxEntries;
            if (index >= start && index < end) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Simpan setting terakhir
        localStorage.setItem('entriesCount', entriesSelect.value);
        localStorage.setItem('currentPage', currentPage);

        renderPagination(totalPages);
    }

    function renderPagination(totalPages) {
        paginationContainer.innerHTML = '';
        if (totalPages <= 1) return;

        const ul = document.createElement('ul');
        ul.className = 'pagination';

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.textContent = i;
            if (i === currentPage) li.classList.add('active');
            li.addEventListener('click', function () {
                currentPage = i;
                renderTable();
            });
            ul.appendChild(li);
        }
        paginationContainer.appendChild(ul);
    }

    searchInput.addEventListener('input', () => { currentPage = 1; renderTable(); });
    entriesSelect.addEventListener('change', () => { currentPage = 1; renderTable(); });

    renderTable();
});
</script>
