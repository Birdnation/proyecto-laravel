describe("Pruebas sobre carreras", () => {
    it("cargar gestión de carreras con administrador", () => {
        cy.login({ rut: "173922825" });
        cy.visit("/carrera");
    });

    it("crear una nueva carrera", () => {
        cy.login({ rut: "173922825" });
        cy.visit("/carrera/create");
        cy.get("#codigo").type("9999").should("have.value", "9999");
        cy.get("#nombre")
            .type("Carrera de prueba")
            .should("have.value", "Carrera de prueba");
        cy.get("#formulario").submit();
    });
});
