document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            let currentStep = 1;
            
            // Función para actualizar el stepper
            function updateStepper(stepNumber) {
                // Actualizar pasos
                steps.forEach((step, index) => {
                    step.classList.remove('active', 'completed');
                    
                    if (index + 1 < stepNumber) {
                        step.classList.add('completed');
                    } else if (index + 1 === stepNumber) {
                        step.classList.add('active');
                    }
                });
                
                // Actualizar contenido
                stepContents.forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(`step-${stepNumber}-content`).classList.add('active');
                
                // Actualizar resumen en paso 3
                if (stepNumber === 3) {
                    updateSummary();
                }
                
                // Actualizar información final en paso 4
                if (stepNumber === 4) {
                    updateFinalInfo();
                }
            }
            
            // Función para actualizar el resumen
            function updateSummary() {
                const nombre = document.getElementById('nombre').value;
                const email = document.getElementById('email').value;
                const telefono = document.getElementById('telefono').value;
                const direccion = document.getElementById('direccion').value;
                const ciudad = document.getElementById('ciudad').value;
                const pais = document.getElementById('pais').options[document.getElementById('pais').selectedIndex].text;
                
                document.getElementById('resumen-info').innerHTML = `
                    <p><strong>Nombre:</strong> ${nombre}</p>
                    <p><strong>Email:</strong> ${email}</p>
                    <p><strong>Teléfono:</strong> ${telefono || 'No proporcionado'}</p>
                    <p><strong>Dirección:</strong> ${direccion}, ${ciudad}</p>
                    <p><strong>País:</strong> ${pais}</p>
                `;
            }
            
            // Función para actualizar la información final
            function updateFinalInfo() {
                const nombre = document.getElementById('nombre').value;
                const email = document.getElementById('email').value;
                
                document.getElementById('final-info').innerHTML = `
                    <p>Hemos enviado un correo de confirmación a <strong>${email}</strong>.</p>
                    <p>Nos pondremos en contacto con <strong>${nombre}</strong> en breve.</p>
                `;
            }
            
            // Event listeners para botones
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Validar formulario antes de avanzar
                    if (currentStep === 1 || currentStep === 2) {
                        const form = document.querySelector(`#step-${currentStep}-content form`);
                        if (!form.checkValidity()) {
                            form.reportValidity();
                            return;
                        }
                    }
                    
                    if (currentStep === 3) {
                        if (!document.getElementById('confirmacion').checked) {
                            alert('Debes confirmar que la información es correcta');
                            return;
                        }
                    }
                    
                    if (currentStep < 4) {
                        currentStep++;
                        updateStepper(currentStep);
                    }
                });
            });
            
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentStep > 1) {
                        currentStep--;
                        updateStepper(currentStep);
                    }
                });
            });
            
            // Event listener para reiniciar
            document.getElementById('reiniciar').addEventListener('click', function() {
                currentStep = 1;
                updateStepper(currentStep);
                document.querySelector('form').reset();
            });
            
            // Event listeners para hacer clic en los pasos
            steps.forEach(step => {
                step.addEventListener('click', function() {
                    const stepNumber = parseInt(this.getAttribute('data-step'));
                    
                    // Solo permitir ir a pasos completados
                    if (this.classList.contains('completed') || this.classList.contains('active')) {
                        currentStep = stepNumber;
                        updateStepper(currentStep);
                    }
                });
            });
            
            // Inicializar
            updateStepper(currentStep);
        });