CREATE TABLE rpg_grid (id BIGINT AUTO_INCREMENT, title VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rpg_grid_space (id BIGINT AUTO_INCREMENT, grid_id BIGINT, terrain_id BIGINT, x BIGINT, y BIGINT, INDEX grid_id_idx (grid_id), INDEX terrain_id_idx (terrain_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rpg_player (id BIGINT AUTO_INCREMENT, name VARCHAR(10), current_unit_id BIGINT, INDEX current_unit_id_idx (current_unit_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rpg_terrain (id BIGINT AUTO_INCREMENT, traversable TINYINT(1) DEFAULT '1', class VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rpg_unit (id BIGINT AUTO_INCREMENT, name VARCHAR(10), player_id BIGINT, grid_space_id BIGINT, image VARCHAR(255), INDEX grid_space_id_idx (grid_space_id), INDEX player_id_idx (player_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE rpg_grid_space ADD CONSTRAINT rpg_grid_space_terrain_id_rpg_terrain_id FOREIGN KEY (terrain_id) REFERENCES rpg_terrain(id);
ALTER TABLE rpg_grid_space ADD CONSTRAINT rpg_grid_space_grid_id_rpg_grid_id FOREIGN KEY (grid_id) REFERENCES rpg_grid(id);
ALTER TABLE rpg_player ADD CONSTRAINT rpg_player_current_unit_id_rpg_unit_id FOREIGN KEY (current_unit_id) REFERENCES rpg_unit(id);
ALTER TABLE rpg_unit ADD CONSTRAINT rpg_unit_player_id_rpg_player_id FOREIGN KEY (player_id) REFERENCES rpg_player(id);
ALTER TABLE rpg_unit ADD CONSTRAINT rpg_unit_grid_space_id_rpg_grid_space_id FOREIGN KEY (grid_space_id) REFERENCES rpg_grid_space(id);
