CREATE DATABASE IF NOT EXISTS nexus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nexus;

CREATE TABLE areas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    icon VARCHAR(10) NOT NULL,
    sort_order TINYINT UNSIGNED NOT NULL DEFAULT 0
);

CREATE TABLE goals (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    area_id INT UNSIGNED NOT NULL,
    title VARCHAR(160) NOT NULL,
    description TEXT NULL,
    status ENUM('not_started','in_progress','on_track','needs_attention','done') NOT NULL DEFAULT 'not_started',
    progress TINYINT UNSIGNED NOT NULL DEFAULT 0,
    deadline DATE NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_goals_area FOREIGN KEY (area_id) REFERENCES areas(id) ON DELETE CASCADE,
    CONSTRAINT chk_goal_progress CHECK (progress BETWEEN 0 AND 100)
);

CREATE TABLE milestones (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(160) NOT NULL,
    completed BOOLEAN NOT NULL DEFAULT FALSE,
    completed_at DATETIME NULL,
    CONSTRAINT fk_milestone_goal FOREIGN KEY (goal_id) REFERENCES goals(id) ON DELETE CASCADE
);

CREATE TABLE schedule_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(160) NOT NULL,
    area_id INT UNSIGNED NULL,
    schedule_date DATE NOT NULL,
    start_time TIME NOT NULL,
    duration VARCHAR(40) NULL,
    status ENUM('planned','done','cancelled') NOT NULL DEFAULT 'planned',
    notes TEXT NULL,
    CONSTRAINT fk_schedule_area FOREIGN KEY (area_id) REFERENCES areas(id) ON DELETE SET NULL
);

CREATE TABLE weekly_priorities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    week_start DATE NOT NULL,
    priority_no TINYINT UNSIGNED NOT NULL,
    title VARCHAR(160) NOT NULL,
    area VARCHAR(50) NOT NULL,
    status VARCHAR(40) NOT NULL DEFAULT 'Planned',
    UNIQUE KEY uq_week_priority (week_start, priority_no)
);

CREATE TABLE weekly_rhythm (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    week_start DATE NOT NULL UNIQUE,
    what_went_well TEXT NULL,
    what_to_improve TEXT NULL,
    education_score TINYINT UNSIGNED NULL,
    skills_score TINYINT UNSIGNED NULL,
    faith_score TINYINT UNSIGNED NULL,
    health_score TINYINT UNSIGNED NULL,
    personal_score TINYINT UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE monthly_rhythm (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    month_start DATE NOT NULL UNIQUE,
    main_goal VARCHAR(200) NULL,
    achievement TEXT NULL,
    lesson TEXT NULL,
    improvement TEXT NULL,
    score DECIMAL(4,2) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO areas (name, icon, sort_order) VALUES
('Education','🎓',1),('Skills','💻',2),('Faith','🕌',3),('Health','🏋',4),('Personal','🧠',5);
