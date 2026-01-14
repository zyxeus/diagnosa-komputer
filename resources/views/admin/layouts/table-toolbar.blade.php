<style>
    .table-toolbar label,
    .table-toolbar span {
        font-weight: 500;
        margin-bottom: 0;
        color: #495057; /* Warna teks diseragamkan */
        font-size: 0.9rem;
    }

    .table-toolbar select,
    .table-toolbar input {
        border-color: #ced4da;
        color: #495057;
        padding: 4px 8px;
        background-color: #fff;
    }

    .table-toolbar select:focus,
    .table-toolbar input:focus {
        box-shadow: none;
        border-color: #6c757d;
    }

    .table-toolbar .form-select,
    .table-toolbar .form-control {
        min-width: 70px;
        font-size: 0.9rem;
    }
</style>

<div class="row mb-3 table-toolbar">
    <div class="col-md-6 d-flex align-items-center">
        <label for="entriesCount" class="me-2">Tampilkan</label>
        <select class="form-select form-select-sm w-auto" id="entriesCount">
            <option>5</option>
            <option>10</option>
            <option>15</option>
        </select>
        <span>entri</span>
    </div>

    <div class="col-md-6 d-flex justify-content-md-end align-items-center mt-2 mt-md-0">
        <label for="searchInput" class="me-2">Cari:</label>
        <input type="text" id="searchInput" class="form-control form-control-sm w-auto" placeholder="Cari data...">
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('searchInput');
    const entriesSelect = document.getElementById('entriesCount');
    const table = document.querySelector('.data-table');
    if (!table) return;

    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // Ambil setting terakhir dari localStorage
    const savedEntries = localStorage.getItem('entriesCount');
    if (savedEntries) {
        entriesSelect.value = savedEntries;
    }

    function renderTable() {
        const searchValue = searchInput.value.toLowerCase();
        const maxEntries = parseInt(entriesSelect.value);
        let visibleCount = 0;

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            const match = rowText.includes(searchValue);

            if (match && visibleCount < maxEntries) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Simpan setting terakhir
        localStorage.setItem('entriesCount', entriesSelect.value);
    }

    searchInput.addEventListener('input', renderTable);
    entriesSelect.addEventListener('change', renderTable);

    renderTable();
});
</script>
