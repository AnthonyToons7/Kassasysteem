const sidebarElements = document.querySelectorAll('.sidebar-element');
sidebarElements.forEach(element=>{
    element.addEventListener('click',()=>{
        const selectedElement = document.querySelector('.selected');
        selectedElement.classList.remove('selected');
        element.classList.add('selected');
        changeCategory(element.id);
    })
})
function changeCategory(id) {
    document.querySelectorAll('.product').forEach(product=>product.style.display="none");

    document.querySelectorAll(`.product.${id}`).forEach(product=>product.style.display="flex");
}