-- Sessions table
CREATE TABLE chat_sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    session_token VARCHAR(255) UNIQUE,
    user_id INT,
    created_at TIMESTAMP,
    last_activity TIMESTAMP,
    context JSON
);

-- Messages table
CREATE TABLE chat_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    session_id INT,
    message TEXT,
    response TEXT,
    message_type ENUM('user', 'bot'),
    timestamp TIMESTAMP,
    matched_pattern VARCHAR(255)
);

-- Patterns and responses
CREATE TABLE bot_patterns (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pattern VARCHAR(500),
    intent VARCHAR(100),
    priority INT,
    is_active BOOLEAN
);

CREATE TABLE bot_responses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pattern_id INT,
    response_template TEXT,
    response_type ENUM('text', 'quick_reply', 'card'),
    variables JSON
);