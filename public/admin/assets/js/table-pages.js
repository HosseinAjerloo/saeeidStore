document.addEventListener('DOMContentLoaded', () => {
  const search = document.querySelector('[data-table-search]');
  const rows = Array.from(document.querySelectorAll('[data-searchable]'));
  const emptyState = document.querySelector('[data-empty-state]');
  const resultCount = document.querySelector('[data-result-count]');

  const updateResults = () => {
    const query = (search?.value || '').trim().toLocaleLowerCase('fa');
    let visible = 0;
    rows.forEach(row => {
      const matches = row.textContent.toLocaleLowerCase('fa').includes(query);
      row.classList.toggle('hidden', !matches);
      if (matches) visible += 1;
    });
    emptyState?.classList.toggle('hidden', visible > 0);
    if (resultCount) resultCount.textContent = visible.toLocaleString('fa-IR');
  };

  search?.addEventListener('input', updateResults);
  document.addEventListener('keydown', event => {
    if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
      event.preventDefault();
      search?.focus();
    }
  });

  const dialog = document.getElementById('deleteDialog');
  const deleteName = document.getElementById('deleteItemName');
  const confirmDelete = document.getElementById('confirmDelete');
  let selectedRow = null;

  const closeDialog = () => {
    dialog?.classList.remove('open');
    document.body.style.overflow = '';
    selectedRow = null;
  };

  document.querySelectorAll('[data-delete]').forEach(button => {
    button.addEventListener('click', () => {
      selectedRow = button.closest('[data-searchable]');
      if (deleteName) deleteName.textContent = button.dataset.delete;
      dialog?.classList.add('open');
      document.body.style.overflow = 'hidden';
    });
  });

  document.querySelectorAll('[data-close-dialog]').forEach(button => button.addEventListener('click', closeDialog));
  dialog?.addEventListener('click', event => { if (event.target === dialog) closeDialog(); });
  document.addEventListener('keydown', event => { if (event.key === 'Escape') closeDialog(); });
  confirmDelete?.addEventListener('click', () => {
    selectedRow?.remove();
    closeDialog();
    updateResults();
  });

  updateResults();
});
