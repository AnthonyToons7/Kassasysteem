const sidebarElements = document.querySelectorAll('.sidebar-element');
sidebarElements.forEach(element=>{
    element.addEventListener('click',()=>{
        const selectedElement = document.querySelector('.selected');
        selectedElement.classList.remove('selected');
        element.classList.add('selected');
        changeCategory(element.id);
    })
});

const checkboxes = document.querySelectorAll(".product-checkbox");
checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
        const productContainer = checkbox.closest(".product");
        if (productContainer) {
            if (checkbox.checked) {
                productContainer.style.borderColor = "green";
            } else {
                productContainer.style.borderColor = "";
            }
        }
    });
});

window.addEventListener("load",changeCategory("drink"));
function changeCategory(id) {
    document.querySelectorAll('.product').forEach(product=>product.style.display="none");

    document.querySelectorAll(`.product.${id}`).forEach(product=>product.style.display="flex");
}