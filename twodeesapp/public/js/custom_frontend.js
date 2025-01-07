const handleDropdownSelection = (event) => {
    const target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    alert(selectedCategoryId);
}

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');

if(categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleDropdownSelection(event);
    });
}