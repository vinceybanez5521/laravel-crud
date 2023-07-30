import './bootstrap';

const deletePositionForms = document.querySelectorAll(".deletePositionForm");
const deleteEmployeeForm = document.querySelector(".deleteEmployeeForm");

deletePositionForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        document.querySelector("#delete-position").addEventListener('click', () => {
            e.target.submit();
        });
    });
});

if (deleteEmployeeForm != null) {
    deleteEmployeeForm.addEventListener('submit', e => {
        e.preventDefault();

        document.querySelector("#delete-employee").addEventListener('click', () => {
            e.target.submit();
        });
    });
}