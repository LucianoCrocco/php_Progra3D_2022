import os

if os.environ.get("USER") == "root":
    while True:
        usuario = input("Ingrese el usuario para asignar los permisos en htdocs: ");   
        path = input("Ingrese el PATH a partir de ~/htdocs/ de la carpeta/s que desea asignarle permisos para crear y editar archivos: ");
        confirmar = input(f"Usuario ingresado: {usuario} - PATH de la carpeta/s: {path}\n¿Ingreso los campos correctamete? [Y/n]: ");
        if confirmar == 'Y':
            break; 
     
      
    os.system("clear");  
    if input("BAJO SU PROPIO RIESGO - ¿Esta seguro que de aplicar cambios? [Y/n]: ") == 'Y':
        os.system(f"sudo chown -R daemon:{usuario} /opt/lampp/htdocs/{path} && sudo chmod -R 775 /opt/lampp/htdocs/{path}")
else:   
    print("No sos root")
