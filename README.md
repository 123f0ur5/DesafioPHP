# DesafioPHP
 
Para rodar o projeto basta seguir o passo a passo!

1. Selecionar um local para salvar o projeto, aqui vou salvar na raiz do D:
<img src="https://prnt.sc/MdcY3G7sZ_f8"/>

2. Comando para clonar o projeto

```
git clone https://github.com/123f0ur5/DesafioPHP.git
```

3. Entrar na pasta criada
```
cd DesafioPHP
```

4. Criar o container do Docker com o comando
```
docker compose up --build -d
```

5. Agora vamos criar o banco de dados no container do SQL, rode o comando e digite a senha: root
```
mysql -u root -p
```

6. Ao chegar no terminal do sql, rode os comandos do arquivo usuarios.sql
```
CREATE DATABASE users;

USE users;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL UNIQUE,
  `imagem` varchar(60) NOT NULL,
  `data_registro` date NOT NULL,
  `quantidade_repositorio` smallint NOT NULL,
  PRIMARY KEY (`id`)
);
```

7. Para confirmar se deu tudo certo, pode rodar o comando
```
SHOW COLUMNS FROM usuarios;
```

8. Agora abra o navegador e vá até o endereço
```
localhost:8000
```

9. O site será renderizado e assim que clicar em gravar, irá criar um registro no banco de dados.


10. Caso queira ver o registro no banco de dados, execute o comando

```
SELECT * FROM usuarios;
```

