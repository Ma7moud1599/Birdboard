# Birdboard — Project Management App

A Laravel-based project management tool inspired by Trello. Teams can create projects, manage tasks within them, invite collaborators, and track all activity through an automatic activity log.

## Features

- **Project Management** — create, update, and delete projects with title, description, and notes
- **Task Management** — add tasks to projects, mark them complete/incomplete
- **Team Collaboration** — invite other users to projects; members share full access
- **Activity Log** — every action (task added, task completed, project updated) is automatically recorded in a polymorphic activity feed
- **Authorization** — only project owners and invited members can view or modify a project
- **Authentication** — full auth flow via Laravel Breeze

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel |
| Auth | Laravel Breeze + Sanctum |
| Frontend | Blade templates |
| Database | MySQL |

## Data Models

| Model | Description |
|---|---|
| `User` | Account holder |
| `Project` | A project with owner, title, notes |
| `Task` | A to-do item inside a project |
| `Activity` | Polymorphic log: what happened, when, by whom |
| `RecordsActivity` | Trait applied to models to auto-log changes |

## Project Structure

```
app/
├── Http/Controllers/
│   ├── ProjectsController.php          # Full project CRUD
│   ├── ProjectTasksController.php      # Task store & update
│   └── ProjectInvitationsController.php # Invite collaborators
└── Models/
    ├── Project.php
    ├── Task.php
    ├── User.php
    ├── Activity.php
    └── RecordsActivity.php             # Trait: auto-logs Eloquent events

database/migrations/
├── create_projects_table.php
├── create_tasks_table.php
├── create_activities_table.php
└── create_project_members_table.php    # Many-to-many: project ↔ user
```

## Routes

| Method | URI | Description |
|---|---|---|
| GET | `/projects` | List user's projects |
| POST | `/projects` | Create a project |
| GET | `/projects/{project}` | View a project |
| PATCH | `/projects/{project}` | Update project |
| DELETE | `/projects/{project}` | Delete project |
| POST | `/projects/{project}/tasks` | Add a task |
| PATCH | `/projects/{project}/tasks/{task}` | Update/complete a task |
| POST | `/projects/{project}/invitations` | Invite a member |

## Installation

```bash
git clone https://github.com/Ma7moud1599/Birdboard.git
cd Birdboard

composer install
npm install

cp .env.example .env
php artisan key:generate

# Configure DB in .env, then:
php artisan migrate --seed

npm run dev
php artisan serve
```

## License

MIT
