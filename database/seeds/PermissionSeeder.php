<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        $viewUserPermission = Permission::create([
            'name'=>'View users',
            'display_name'=>'Ver usuarios'
        ]);
        $createUserPermission = Permission::create([
            'name'=>'Create users',
            'display_name'=>'Crear usuarios'
        ]);
        $updateUserPermission = Permission::create([
            'name'=>'Update users',
            'display_name'=>'Actualizar usuarios'
        ]);
        $deleteUserPermission = Permission::create([
            'name'=>'Delete users',
            'display_name'=>'Eliminar usuarios'
        ]);

        //Roles
        $createRolesPermission = Permission::create([
            'name'=>'Create roles',
            'display_name'=>'Crear roles'
        ]);
        $createRolesPermission = Permission::create([
            'name'=>'View roles',
            'display_name'=>'Ver roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name'=>'Update roles',
            'display_name'=>'Actualizar roles'
        ]);        
        $deleteRolesPermission = Permission::create([
            'name'=>'Delete roles',
            'display_name'=>'Eliminar roles'
        ]);

        //Permissions
        $viewPermission = Permission::create([
            'name'=>'View permissions',
            'display_name'=>'Ver permisos'
        ]);
        $updatePermission = Permission::create([
            'name'=>'Update permissions',
            'display_name'=>'Actualizar permisos'
        ]);

        //Tipo arrastre
        $viewTArrastrePermission = Permission::create([
            'name'=>'View tArrastre',
            'display_name'=>'Ver tipo arrastre'
        ]);
        $createTArrastrePermission = Permission::create([
            'name'=>'Create tArrastre',
            'display_name'=>'Crear tipo arrastre'
        ]);
        $updateTArrastrePermission = Permission::create([
            'name'=>'Update tArrastre',
            'display_name'=>'Actualizar tipo arrastre'
        ]);
        $deleteTArrastrePermission = Permission::create([
            'name'=>'Delete tArrastre',
            'display_name'=>'Eliminar tipo arrastre'
        ]);

        //Tipo equipo
        $viewTEquipoPermission = Permission::create([
            'name'=>'View tEquipo',
            'display_name'=>'Ver tipo equipo'
        ]);
        $createTEquipoPermission = Permission::create([
            'name'=>'Create tEquipo',
            'display_name'=>'Crear tipo equipo'
        ]);
        $updateTEquipoPermission = Permission::create([
            'name'=>'Update tEquipo',
            'display_name'=>'Actualizar tipo equipo'
        ]);
        $deleteTEquipoPermission = Permission::create([
            'name'=>'Delete tEquipo',
            'display_name'=>'Eliminar tipo equipo'
        ]);

        //Arrastres
        $viewArrastrePermission = Permission::create([
            'name'=>'View arrastre',
            'display_name'=>'Ver arrastres'
        ]);
        $createArrastrePermission = Permission::create([
            'name'=>'Create arrastre',
            'display_name'=>'Crear arrastres'
        ]);
        $updateArrastrePermission = Permission::create([
            'name'=>'Update arrastre',
            'display_name'=>'Actualizar arrastres'
        ]);
        $deleteArrastrePermission = Permission::create([
            'name'=>'Delete arrastre',
            'display_name'=>'Eliminar arrastres'
        ]);

        //Choferes
        $viewChoferPermission = Permission::create([
            'name'=>'View chofer',
            'display_name'=>'Ver chofer'
        ]);
        $createChoferPermission = Permission::create([
            'name'=>'Create chofer',
            'display_name'=>'Crear chofer'
        ]);
        $updateChoferPermission = Permission::create([
            'name'=>'Update chofer',
            'display_name'=>'Actualizar chofer'
        ]);
        $deleteChoferPermission = Permission::create([
            'name'=>'Delete chofer',
            'display_name'=>'Eliminar chofer'
        ]);

        //Envases
        $viewEnvasePermission = Permission::create([
            'name'=>'View envase',
            'display_name'=>'Ver envase'
        ]);
        $createEnvasePermission = Permission::create([
            'name'=>'Create envase',
            'display_name'=>'Crear envase'
        ]);
        $updateEnvasePermission = Permission::create([
            'name'=>'Update envase',
            'display_name'=>'Actualizar envase'
        ]);
        $deleteEnvasePermission = Permission::create([
            'name'=>'Delete envase',
            'display_name'=>'Eliminar envase'
        ]);

        //Equipos
        $viewEquipoPermission = Permission::create([
            'name'=>'View equipo',
            'display_name'=>'Ver equipos'
        ]);
        $createEquipoPermission = Permission::create([
            'name'=>'Create equipo',
            'display_name'=>'Crear equipos'
        ]);
        $updateEquipoPermission = Permission::create([
            'name'=>'Update equipo',
            'display_name'=>'Actualizar equipos'
        ]);
        $deleteEquipoPermission = Permission::create([
            'name'=>'Delete equipo',
            'display_name'=>'Eliminar equipos'
        ]);

        //Lugares
        $viewLugarPermission = Permission::create([
            'name'=>'View lugar',
            'display_name'=>'Ver lugares'
        ]);
        $createLugarPermission = Permission::create([
            'name'=>'Create lugar',
            'display_name'=>'Crear lugares'
        ]);
        $updateLugarPermission = Permission::create([
            'name'=>'Update lugar',
            'display_name'=>'Actualizar lugares'
        ]);
        $deleteLugarPermission = Permission::create([
            'name'=>'Delete lugar',
            'display_name'=>'Eliminar lugares'
        ]);

        //Municipios
        $viewMunicipioPermission = Permission::create([
            'name'=>'View municipio',
            'display_name'=>'Ver municipios'
        ]);
        $createMunicipioPermission = Permission::create([
            'name'=>'Create municipio',
            'display_name'=>'Crear municipios'
        ]);
        $updateMunicipioPermission = Permission::create([
            'name'=>'Update municipio',
            'display_name'=>'Actualizar municipios'
        ]);
        $deleteMunicipioPermission = Permission::create([
            'name'=>'Delete municipio',
            'display_name'=>'Eliminar municipios'
        ]);

        //Organizaciones
        $viewOrgPermission = Permission::create([
            'name'=>'View organization',
            'display_name'=>'Ver organizacion'
        ]);
        $createOrgPermission = Permission::create([
            'name'=>'Create organization',
            'display_name'=>'Crear organizacion'
        ]);
        $updateOrgPermission = Permission::create([
            'name'=>'Update organization',
            'display_name'=>'Actualizar organizacion'
        ]);
        $deleteOrgPermission = Permission::create([
            'name'=>'Delete organization',
            'display_name'=>'Eliminar organizacion'
        ]);

        //Terceros
        $viewTerceroPermission = Permission::create([
            'name'=>'View tercero',
            'display_name'=>'Ver tercero'
        ]);
        $createTerceroPermission = Permission::create([
            'name'=>'Create tercero',
            'display_name'=>'Crear tercero'
        ]);
        $updateTerceroPermission = Permission::create([
            'name'=>'Update tercero',
            'display_name'=>'Actualizar tercero'
        ]);
        $deleteTerceroPermission = Permission::create([
            'name'=>'Delete tercero',
            'display_name'=>'Eliminar tercero'
        ]);

        //Tipo unidad de medida
        $viewTUMPermission = Permission::create([
            'name'=>'View TunidadMedida',
            'display_name'=>'Ver unidad de medida'
        ]);
        $createTUMPermission = Permission::create([
            'name'=>'Create TunidadMedida',
            'display_name'=>'Crear unidad de medida'
        ]);
        $updateTUMPermission = Permission::create([
            'name'=>'Update TunidadMedida',
            'display_name'=>'Actualizar unidad de medida'
        ]);
        $deleteTUMPermission = Permission::create([
            'name'=>'Delete TunidadMedida',
            'display_name'=>'Eliminar unidad de medida'
        ]);

        //Unidades de medida
        $viewUMPermission = Permission::create([
            'name'=>'View unidadMedida',
            'display_name'=>'Ver unidad de medida'
        ]);
        $createUMPermission = Permission::create([
            'name'=>'Create unidadMedida',
            'display_name'=>'Crear unidad de medida'
        ]);
        $updateUMPermission = Permission::create([
            'name'=>'Update unidadMedida',
            'display_name'=>'Actualizar unidad de medida'
        ]);
        $deleteUMPermission = Permission::create([
            'name'=>'Delete unidadMedida',
            'display_name'=>'Eliminar unidad de medida'
        ]);

        //transportacion
        $viewTransportacionPermission = Permission::create([
            'name'=>'View transportation',
            'display_name'=>'Ver transportacion'
        ]);
        $createTransportacionPermission = Permission::create([
            'name'=>'Create transportation',
            'display_name'=>'Crear transportacion'
        ]);
        $updateTransportacionPermission = Permission::create([
            'name'=>'Update transportation',
            'display_name'=>'Actualizar transportacion'
        ]);
        $deleteTransportacionPermission = Permission::create([
            'name'=>'Delete transportation',
            'display_name'=>'Eliminar transportacion'
        ]);

        //Productos
        $viewProductoPermission = Permission::create([
            'name'=>'View producto',
            'display_name'=>'Ver productos'
        ]);
        $createProductoPermission = Permission::create([
            'name'=>'Create producto',
            'display_name'=>'Crear productos'
        ]);
        $updateProductoPermission = Permission::create([
            'name'=>'Update producto',
            'display_name'=>'Actualizar productos'
        ]);
        $deleteProductoPermission = Permission::create([
            'name'=>'Delete producto',
            'display_name'=>'Eliminar productos'
        ]);

        //Provincia
        $viewProvinciaPermission = Permission::create([
            'name'=>'View provincia',
            'display_name'=>'Ver provincias'
        ]);
        $createProvinciaPermission = Permission::create([
            'name'=>'Create provincia',
            'display_name'=>'Crear provincias'
        ]);
        $updateProvinciaPermission = Permission::create([
            'name'=>'Update provincia',
            'display_name'=>'Actualizar provincias'
        ]);
        $deleteProvinciaPermission = Permission::create([
            'name'=>'Delete provincia',
            'display_name'=>'Eliminar provincias'
        ]);

        //Tipo Hito
        $viewTHitoPermission = Permission::create([
            'name'=>'View tHito',
            'display_name'=>'Ver tipo hito'
        ]);
        $createTHitoPermission = Permission::create([
            'name'=>'Create tHito',
            'display_name'=>'Crear tipo hito'
        ]);
        $updateTHitoPermission = Permission::create([
            'name'=>'Update tHito',
            'display_name'=>'Actualizar tipo hito'
        ]);
        $deleteTHitoPermission = Permission::create([
            'name'=>'Delete tHito',
            'display_name'=>'Eliminar tipo hito'
        ]);

        //Hito
        $viewHitoPermission = Permission::create([
            'name'=>'View hito',
            'display_name'=>'Ver hito'
        ]);
        $createHitoPermission = Permission::create([
            'name'=>'Create hito',
            'display_name'=>'Crear hito'
        ]);
        $updateHitoPermission = Permission::create([
            'name'=>'Update hito',
            'display_name'=>'Actualizar hito'
        ]);
        $deleteHitoPermission = Permission::create([
            'name'=>'Delete hito',
            'display_name'=>'Eliminar hito'
        ]);

        //Directivos
        $viewDirectivoPermission = Permission::create([
            'name'=>'View directivo',
            'display_name'=>'Ver directivo'
        ]);
        $createDirectivoPermission = Permission::create([
            'name'=>'Create directivo',
            'display_name'=>'Crear directivo'
        ]);
        $updateDirectivoPermission = Permission::create([
            'name'=>'Update directivo',
            'display_name'=>'Actualizar directivo'
        ]);
        $deleteDirectivoPermission = Permission::create([
            'name'=>'Delete directivo',
            'display_name'=>'Eliminar directivo'
        ]);
    }
}
