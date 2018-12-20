workflow "CI" {
  on = "push"
  resolves = ["Check code style", "Run unit test"]
}

action "Install dependencies" {
  uses = "./.github/action-composer"
  args = "install"
}

action "Check code style" {
  uses = "./.github/action-composer"
  needs = ["Install dependencies"]
  args = "lint"
}

action "Run unit test" {
  uses = "./.github/action-composer"
  needs = ["Install dependencies"]
  args = "test"
}

workflow "New workflow" {
  on = "push"
  resolves = ["GitHub Action for Pixela"]
}

action "GitHub Action for Pixela" {
  uses = "./.github/action-pixela"
  env = {
    PIXELA_USER = "s083027"
    PIXELA_GRAPH = "test"
  }
  secrets = ["PIXELA_TOKEN"]
}
