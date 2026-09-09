const searchInput = document.querySelector('#product-search');
const filterButtons = document.querySelectorAll('.filter');
const cards = document.querySelectorAll('.product-card');
const emptyState = document.querySelector('.empty-state');
let activeCategory = 'All Laptops';

function filterProducts() {
    const searchTerm = searchInput.value.trim().toLowerCase();
    let visibleCount = 0;

    cards.forEach((card) => {
        const matchesSearch = card.dataset.search.includes(searchTerm);
        const matchesCategory = activeCategory === 'All Laptops' || card.dataset.brand === activeCategory;
        const isVisible = matchesSearch && matchesCategory;
        card.hidden = !isVisible;
        if (isVisible) visibleCount += 1;
    });

    emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
}

searchInput.addEventListener('input', filterProducts);
filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
        filterButtons.forEach((item) => item.classList.remove('active'));
        button.classList.add('active');
        activeCategory = button.dataset.category;
        filterProducts();
    });
});
