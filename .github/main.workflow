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
