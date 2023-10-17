

openapi: 3.0.3
info:
  title: API WEB
  description: |-
    Inserer une description
  contact:
    email: arthur.chevassut@etu.imt-nord-europe.fr
  license:
    name: Apache 2.0
    url: http://www.apache.org/licenses/LICENSE-2.0.html
  version: 1.0.11
servers:
  - url: http://localhost/IDAW/TP4/APIRest/product
tags:
  - name: user
    description: Operations sur les utilisateurs
paths:
  
  /create.php:
    post:
      tags:
        - user
      summary: Création d'utilisateur
      description: Permet de créer un utilisateur
      operationId: createUser
      requestBody:
        description: Created user object
        content:
          application/json:
            schema:
              $ref: '#/components/schemas/User'
      responses:
        default:
          description: successful operation
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/User'
            application/xml:
              schema:
                $ref: '#/components/schemas/User'
                
  /read_one.php?id={id}:
    get:
      tags:
        - user
      summary: Trouver un utilisateur par son ID
      description: ''
      operationId: getUserById
      parameters:
        - name: id
          in: path
          description: 'Utilisez 1 pour tester l API '
          required: true
          schema:
            type: integer
      responses:
        '200':
          description: 'Utilisateur trouvé'
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/User'          
        '400':
          description: 'ID fournit invalide'
        '404':
          description: 'Utilisateur non trouvé'
          
  /update.php:
    post:
      tags:
        - user
      summary: Met à jour un utilisateur
      description: ''
      operationId: updateUser
      requestBody:
        description: Update an existent user in the store
        content:
          application/json:
            schema:
              $ref: '#/components/schemas/User'
          application/xml:
            schema:
              $ref: '#/components/schemas/User'
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/User'
      responses:
        default:
          description: successful operation
  /delete.php:  
    post:
      tags:
        - user
      summary: Supprime un utilisateur
      description: ''
      operationId: deleteUser
      parameters:
        - name: id
          in: path
          description: ID de l'utilisateur à supprimer
          required: true
          schema:
            type: string
      responses:
        '400':
          description: ID fourni invalide
        '404':
          description: Utilisateur non trouvé
components:
  schemas:
    User:
      type: object
      properties:
        id:
          type: integer
          format: int64
          example: 10
        name:
          type: string
          example: John
        email:
          type: string
          example: john@email.com
      xml:
        name: user
  requestBodies:
    UserArray:
      description: List of user object
      content:
        application/json:
          schema:
            type: array
            items:
              $ref: '#/components/schemas/User'
