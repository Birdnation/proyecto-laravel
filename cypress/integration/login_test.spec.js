describe("Pruebas a la pagina de login", () => {
    it("carga pagina de inicio", () => {
        cy.visit("/home");
    });

    it("carga pagina login", () => {
        cy.visit("/login");
    });

    it("Iniciar como administrador", () => {
        cy.login({ rut: "173922825" });

        cy.visit("/home").contains("Administrar usuarios");
    });

    it("entrar a administrar usuarios", () => {
        cy.login({ rut: "173922825" });

        cy.visit("/usuario").contains("Gestión de Usuarios");
    });

    it("crear un usuario como administrador", () => {
        cy.refreshDatabase();
        cy.seed();
        cy.login({ rut: "173922825" });
        cy.visit("/usuario/create").contains("CREAR USUARIO");
        cy.get("#name")
            .type("usuario de prueba")
            .should("have.value", "usuario de prueba");
        cy.get("#email")
            .type("prueba.cypress@cypress.cl")
            .should("have.value", "prueba.cypress@cypress.cl");
        cy.get("#rut").type("9999").should("have.value", "9999");
        cy.get("#rol").select("Alumno").should("have.value", "Alumno");
        cy.get("#carrera").select("1").should("have.value", "1");
        cy.get("#form_create").submit();
        cy.visit("/usuario").contains("9999");
    });
});
